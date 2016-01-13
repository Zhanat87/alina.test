<?php

namespace backend\modules\user\controllers;

use Yii;
use backend\my\yii2\Controller;
use backend\modules\user\models\LoginForm;

/**
 * Class AllowController
 * @package backend\modules\user\controllers
 * гости
 */
class AllowController extends Controller
{

    /**
     * @param \yii\base\Action $action
     * @return bool
     */
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            if ($action->id != 'error') {
                if (!Yii::$app->user->isGuest) {
                    return $this->goHome();
                }
                $this->layout = '@app/layouts/login';
            }
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionLogin()
    {
        $model = new LoginForm;
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $this->redirect('/');
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

}