<?php

namespace backend\modules\user\controllers;

use Yii;
use yii\filters\VerbFilter;
use backend\modules\rbac\models\AuthItem;
use backend\modules\subdivision\models\Subdivision;
use yii\helpers\ArrayHelper;
use backend\modules\result\models\Department;

/**
 * Class DenyController
 * @package backend\modules\user\controllers
 * авторизованные пользователи
 */
class DenyController extends UserController
{

    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ]);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        $this->redirect(Yii::$app->user->loginUrl);
    }

    public function actionProfile()
    {
        $model = $this->findModel(Yii::$app->getRequest()->getCookies()->getValue('userId'));
        return $this->render('@app/modules/user/views/user/view', [
            'model' => $model,
            'statuses' => $model->getStatuses(),
            'subdivisions' => Subdivision::getAllForLists(),
            'roles' => AuthItem::getRoles(),
            'departments' => Department::getAllForLists(),
            'applications' => $model->getApplications(),
            'answers' => Yii::$app->current->getAnswers(),
        ]);
    }

    public function actionProfileEdit()
    {
        $model = $this->findModel(Yii::$app->getRequest()->getCookies()->getValue('userId'));
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['profile']);
        } else {
            return $this->render('@app/modules/user/views/user/update2', [
                'model' => $model,
                'subdivisions' => Subdivision::getAllForLists(),
                'statuses' => $model->getStatuses(),
                'roles' => AuthItem::getRoles(),
                'departments' => Department::getAllForLists(),
                'applications' => $model->getApplications(),
                'answers' => Yii::$app->current->getAnswers(),
            ]);
        }
    }

}