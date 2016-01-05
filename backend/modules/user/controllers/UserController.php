<?php

namespace backend\modules\user\controllers;

use Yii;
use backend\modules\user\models\User;
use backend\modules\user\models\search\UserSearch;
use backend\my\yii2\CrudController;
use yii\widgets\ActiveForm;
use backend\modules\rbac\models\AuthItem;
use yii\web\Response;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends CrudController
{

    /**
     * @return bool|void
     */
    public function init()
    {
        parent::init();
        $this->modelClass = User::className();
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'statuses' => Yii::$app->current->defaultValue($searchModel->getStatuses()),
            'roles' => Yii::$app->current->defaultValue(AuthItem::getRoles()),
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $model,
            'statuses' => $model->getStatuses(),
            'roles' => Yii::$app->current->defaultValue(AuthItem::getRoles()),
        ]);
    }

    /**
     * Creates a new User model.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        $model->setScenario($model::SCENARIO_CREATE);
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($model->save()) {
                return Yii::$app->params['response']['success'];
            } else {
                return ActiveForm::validate($model);
            }
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
                'roles' => AuthItem::getRoles(),
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($model->save()) {
                return Yii::$app->params['response']['success'];
            } else {
                return ActiveForm::validate($model);
            }
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
                'roles' => AuthItem::getRoles(),
            ]);
        }
    }

}