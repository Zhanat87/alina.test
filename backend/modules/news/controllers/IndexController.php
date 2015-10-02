<?php

namespace backend\modules\news\controllers;

use Yii;
use backend\modules\news\models\News;
use backend\modules\news\models\search\NewsSearch;
use backend\my\yii2\Controller;
use yii\web\NotFoundHttpException;
use backend\my\actions\RemoveAction;
use backend\my\actions\DeleteAction;
use backend\my\actions\RestoreAction;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/**
 * IndexController implements the CRUD actions for News model.
 */
class IndexController extends Controller
{

    public function actions()
    {
        return [
            'remove' => [
                'class' => RemoveAction::className(),
                'modelClass' => News::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => News::className(),
            ],
            'restore' => [
                'class' => RestoreAction::className(),
                'modelClass' => News::className(),
            ],
        ];
    }

    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'remove' => ['post'],
                    'delete' => ['post'],
                    'restore' => ['post'],
                ],
            ],
        ]);
    }

    /**
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'statuses' => Yii::$app->current->defaultValue(Yii::$app->current->getStatuses()),
        ]);
    }

    /**
     * Creates a new News model.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new News;
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
                'statuses' => Yii::$app->current->getStatuses(),
            ]);
        }
    }

    /**
     * Updates an existing News model.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
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
                'statuses' => Yii::$app->current->getStatuses(),
            ]);
        }
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}