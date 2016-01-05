<?php

namespace backend\my\actions;

use Yii;
use yii\base\Action;
use yii\web\NotFoundHttpException;
use yii\web\BadRequestHttpException;
use common\my\yii2\ActiveRecord;

/**
 * Class SwitchAction
 * @package backend\my\actions
 *
 * можно еще доделать до параметров и их значений (не только статуса),
 * но т.к. всегда называю поле в таблице "status" для
 * определения состояния записи, то просто зашил в код это поле и значения
 * и вообще нужно сервисы писать) но здесь это будет оверинжинирингом
 */
class SwitchAction extends Action
{

    /** @var ActiveRecord $model */
    private $model;

    const ACTION_DELETE = 'delete';
    const ACTION_RESTORE = 'restore';
    const ACTION_REMOVE = 'remove';

    /**
     * @throws BadRequestHttpException
     */
    public function init()
    {
        if (!(Yii::$app->request->isAjax && Yii::$app->request->isPost)) {
            throw new BadRequestHttpException('Запрос не ajax\'овский!!!');
        }
    }

    /**
     * @throws \yii\web\BadRequestHttpException
     * @param int $id
     * @return array
     */
    public function run($id)
    {
        if ($this->findModel($id)) {
            switch ($this->id) {
                case self::ACTION_DELETE :
                    $this->model->status = 0;
                    return Yii::$app->params['response'][$this->model->save(false) ? 'success' : 'error'];
                    break;
                case self::ACTION_RESTORE :
                    $this->model->status = 1;
                    return Yii::$app->params['response'][$this->model->save(false) ? 'success' : 'error'];
                    break;
                case self::ACTION_REMOVE :
                    return Yii::$app->params['response'][$this->model->delete() ? 'success' : 'error'];
                    break;
            }
        }
        return Yii::$app->params['response']['error'];
    }

    /**
     * Finds the model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return \yii\db\ActiveRecord the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        /** @var \backend\my\yii2\AjaxCrudController $this->controller */
        /** @var ActiveRecord $class */
        $class = $this->controller->modelClass;
        if ($id !== null && ($this->model = $class::findOne($id)) !== null) {
            return true;
        } else {
            throw new NotFoundHttpException('Запрашиваемая страница не существует.');
        }
    }

}