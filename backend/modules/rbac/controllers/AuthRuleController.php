<?php

namespace backend\modules\rbac\controllers;

use Yii;
use backend\modules\rbac\models\AuthRule;
use backend\modules\rbac\models\search\AuthRuleSearch;
use backend\my\yii2\AjaxCrudController;
use yii\web\NotFoundHttpException;
use yii\widgets\ActiveForm;

/**
 * AuthRuleController implements the CRUD actions for AuthRule model.
 */
class AuthRuleController extends AjaxCrudController
{

    /**
     * @return bool|void
     */
    public function init()
    {
        parent::init();
        $this->modelClass = AuthRule::className();
    }

    /**
     * Lists all AuthRule models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuthRuleSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Creates a new AuthRule model.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthRule;
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            if($model->save()) {
                return Yii::$app->params['response']['success'];
            } else {
                return ActiveForm::validate($model);
            }
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AuthRule model.
     * @param string $name
     * @return mixed
     */
    public function actionUpdate($name)
    {
        $model = $this->findModel($name);
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            if($model->save()) {
                return Yii::$app->params['response']['success'];
            } else {
                return ActiveForm::validate($model);
            }
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Finds the AuthRule model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $name
     * @return AuthRule the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($name)
    {
        if (($model = AuthRule::findOne($name)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}