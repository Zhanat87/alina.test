<?php

namespace backend\modules\book\controllers;

use Yii;
use backend\modules\book\models\Book;
use backend\modules\book\models\Author;
use backend\modules\book\models\search\BookSearch;
use backend\my\yii2\Controller;
use yii\web\NotFoundHttpException;
use backend\my\actions\RemoveAction;
use backend\my\actions\DeleteAction;
use backend\my\actions\RestoreAction;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use backend\modules\book\services\ImageRemove;

/**
 * IndexController implements the CRUD actions for Book model.
 */
class IndexController extends Controller
{

    public function actions()
    {
        return [
            'remove' => [
                'class' => RemoveAction::className(),
                'modelClass' => Book::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Book::className(),
            ],
            'restore' => [
                'class' => RestoreAction::className(),
                'modelClass' => Book::className(),
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
     * Lists all Book models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BookSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'statuses' => Yii::$app->current->defaultValue(Yii::$app->current->getStatuses()),
            'authors' => Yii::$app->current->defaultValue(Author::getAllForLists()),
        ]);
    }

    /**
     * Creates a new Book model.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Book;
        if (Yii::$app->request->isPost) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $model->load(Yii::$app->request->post());
            if($model->save()) {
                return Yii::$app->params['response']['success'];
            } else {
                return ActiveForm::validate($model);
            }
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
                'statuses' => Yii::$app->current->getStatuses(),
                'authors' => Author::getAllForLists(),
            ]);
        }
    }

    /**
     * Updates an existing Book model.
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
                'statuses' => Yii::$app->current->getStatuses(),
                'authors' => Author::getAllForLists(),
            ]);
        }
    }

    /**
     * Finds the Book model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Book the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Book::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionImageRemove()
    {
        return ImageRemove::run($this);
    }

}