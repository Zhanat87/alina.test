<?php

namespace backend\modules\rbac\controllers;

use Yii;
use backend\modules\rbac\models\AuthItem;
use backend\modules\user\models\User;
use backend\modules\rbac\models\AuthAssignment;
use backend\modules\rbac\models\search\AuthAssignmentSearch;
use backend\my\yii2\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/**
 * AuthAssignmentController implements the CRUD actions for AuthAssignment model.
 */
class AuthAssignmentController extends Controller
{

    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'remove' => ['post'],
                    'delete' => ['post'],
                ],
            ],
        ]);
    }

    /**
     * Lists all AuthAssignment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuthAssignmentSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'authItems' => Yii::$app->current->defaultValue(AuthItem::getAllForLists()),
            'users' => Yii::$app->current->defaultValue(User::getAllForLists()),
        ]);
    }

    /**
     * Creates a new AuthAssignment model.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthAssignment;
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            Yii::$app->response->format = 'json';
            if($model->save()) {
                return Yii::$app->params['response']['success'];
            } else {
                return ActiveForm::validate($model);
            }
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
                'users' => User::getAllForLists(),
                'authItems' => AuthItem::getAllForLists2(),
            ]);
        }
    }

    /**
     * Updates an existing AuthAssignment model.
     * @param string $item_name
     * @param integer $user_id
     * @return mixed
     */
    public function actionUpdate($item_name, $user_id)
    {
        $model = $this->findModel($item_name, $user_id);
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            Yii::$app->response->format = 'json';
            if($model->save()) {
                return Yii::$app->params['response']['success'];
            } else {
                return ActiveForm::validate($model);
            }
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
                'users' => User::getAllForLists(),
                'authItems' => AuthItem::getAllForLists2(),
            ]);
        }
    }

    /**
     * Deletes an existing AuthAssignment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $item_name
     * @param integer $user_id
     * @return mixed
     */
    public function actionDelete($item_name, $user_id)
    {
        $this->findModel($item_name, $user_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Removes an existing AuthAssignment model.
     * @param string $item_name
     * @param integer $user_id
     * @return mixed
     */
    public function actionRemove($item_name, $user_id)
    {
        Yii::$app->response->format = 'json';
        if ($this->findModel($item_name, $user_id)->delete()) {
            return Yii::$app->params['ajaxOk'];
        }
        return Yii::$app->params['ajaxError'];
    }

    /**
     * Finds the AuthAssignment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $item_name
     * @param integer $user_id
     * @return AuthAssignment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($item_name, $user_id)
    {
        if (($model = AuthAssignment::findOne(['item_name' => $item_name, 'user_id' => $user_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}