<?php

namespace backend\modules\rbac\controllers;

use Yii;
use backend\modules\rbac\models\AuthItem;
use backend\modules\rbac\models\search\AuthItemSearch;
use backend\my\yii2\AjaxCrudController;
use yii\web\NotFoundHttpException;
use backend\modules\rbac\models\AuthRule;
use yii\widgets\ActiveForm;

/**
 * AuthItemController implements the CRUD actions for AuthItem model.
 */
class AuthItemController extends AjaxCrudController
{

    /**
     * @return bool|void
     */
    public function init()
    {
        parent::init();
        $this->modelClass = AuthItem::className();
    }

    /**
     * Lists all AuthItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuthItemSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Creates a new AuthItem model.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthItem;
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
                'authRules' => AuthRule::getAllForLists(),
                'types' => $model->getTypes(),
            ]);
        }
    }

    /**
     * Updates an existing AuthItem model.
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
                'authRules' => AuthRule::getAllForLists(),
                'types' => $model->getTypes(),
            ]);
        }
    }

    /**
     * Finds the AuthItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $name
     * @return AuthItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($name)
    {
        if (($model = AuthItem::findOne($name)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}