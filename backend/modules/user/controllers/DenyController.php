<?php

namespace backend\modules\user\controllers;

use Yii;
use yii\filters\VerbFilter;
use backend\modules\rbac\models\AuthItem;
use yii\helpers\ArrayHelper;

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
        $model = $this->findModel(Yii::$app->access->getUserId());
        return $this->render('@app/modules/user/views/user/view', [
            'model' => $model,
            'statuses' => $model->getStatuses(),
            'roles' => AuthItem::getRoles(),
        ]);
    }

    public function actionProfileEdit()
    {
        $model = $this->findModel(Yii::$app->access->getUserId());
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['profile']);
        } else {
            return $this->render('@app/modules/user/views/user/update2', [
                'model' => $model,
                'statuses' => $model->getStatuses(),
                'roles' => AuthItem::getRoles(),
            ]);
        }
    }

}