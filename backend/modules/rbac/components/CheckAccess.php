<?php

namespace backend\modules\rbac\components;

use Yii;
use yii\web\ForbiddenHttpException;
use yii\base\Behavior;
use backend\my\yii2\Controller;

/**
 * Class CheckAccess
 * @package backend\modules\rbac\components
 */
class CheckAccess extends Behavior
{

    /**
     * @inheritdoc
     */
    public function attach($owner)
    {
        $this->owner = $owner;
        $owner->on(Controller::EVENT_BEFORE_ACTION, [$this, 'beforeAction']);
        $owner->on(Controller::EVENT_AFTER_ACTION, [$this, 'afterAction']);
    }

    /**
     * @inheritdoc
     */
    public function detach()
    {
        if ($this->owner) {
            $this->owner->off(Controller::EVENT_BEFORE_ACTION, [$this, 'beforeAction']);
            $this->owner->off(Controller::EVENT_AFTER_ACTION, [$this, 'afterAction']);
            $this->owner = null;
        }
    }

    /**
     * @param $event
     * @return bool
     * @throws ForbiddenHttpException
     * проверка доступа
     */
    public static function beforeAction($event)
    {
        if (Yii::$app->request->isAjax) {
            return true;
        }
        $module = $event->action->controller->module->id;
        $controller = $event->action->controller->id;
        $action = $event->action->id;
        if ($module == 'user' && $controller == 'allow') {
            return true;
        }
        if (!Yii::$app->user->isGuest) {
            if ($module == 'user' && $controller == 'deny') {
                return true;
            }

            // администратор
            if (Yii::$app->access->isAdmin()) {
                return true;
            }

            $userId = Yii::$app->access->getUserId();

            if (Yii::$app->authManager->checkAccess($userId, $module)) {
                return true;
            }

            $permissionName = $module . '-' . $controller . '-' . $action;

            $params = [];
            $id = (int) Yii::$app->request->getQueryParam('id', 0);
            if ($id) {
                $params['id'] = $id;
            }
            $can = Yii::$app->authManager->checkAccess($userId, $permissionName, $params);
            if ($can) {
                return true;
            } else {
                if (Yii::$app->request->isAjax || Yii::$app->request->isPjax) {
                    return false;
                } else {
                    throw new ForbiddenHttpException('Не хватает прав', 403);
                }
            }
        } else {
            Yii::$app->getResponse()->redirect(Yii::$app->user->loginUrl);
        }
    }

    /**
     * @param $event
     * @return bool
     */
    public function afterAction($event)
    {
        if ($event->action->id != 'captcha') {
            Yii::$app->session->set('returnUrl', Yii::$app->request->url);
        }
        return true;
    }

}