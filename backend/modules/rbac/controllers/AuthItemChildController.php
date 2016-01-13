<?php

namespace backend\modules\rbac\controllers;

use Yii;
use backend\modules\rbac\models\AuthItemChild;
use backend\modules\rbac\models\search\AuthItemChildSearch;
use backend\my\yii2\AjaxCrudController;
use yii\web\NotFoundHttpException;
use backend\modules\rbac\models\AuthItem;
use yii\widgets\ActiveForm;

/**
 * AuthItemChildController implements the CRUD actions for AuthItemChild model.
 */
class AuthItemChildController extends AjaxCrudController
{

    /**
     * @return bool|void
     */
    public function init()
    {
        parent::init();
        $this->modelClass = AuthItemChild::className();
    }

    /**
     * Lists all AuthItemChild models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuthItemChildSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'authItems' => Yii::$app->current->defaultValue(AuthItem::getAllForLists2()),
        ]);
    }

    /**
     * Creates a new AuthItemChild model.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthItemChild;
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            if ($model->save()) {
                return Yii::$app->params['response']['success'];
            } else {
                return ActiveForm::validate($model);
            }
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
                'authItems' => AuthItem::getAllForLists2(),
            ]);
        }
    }

    /**
     * Updates an existing AuthItemChild model.
     * @param string $parent
     * @param string $child
     * @return mixed
     */
    public function actionUpdate($parent, $child)
    {
        $model = $this->findModel($parent, $child);
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            if ($model->save()) {
                return Yii::$app->params['response']['success'];
            } else {
                return ActiveForm::validate($model);
            }
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
                'authItems' => AuthItem::getAllForLists2(),
            ]);
        }
    }

    /**
     * Finds the AuthItemChild model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $parent
     * @param string $child
     * @return AuthItemChild the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($parent, $child)
    {
        if (($model = AuthItemChild::findOne(['parent' => $parent, 'child' => $child])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}