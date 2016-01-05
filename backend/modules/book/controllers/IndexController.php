<?php

namespace backend\modules\book\controllers;

use Yii;
use backend\modules\book\models\Book;
use backend\modules\book\models\Author;
use backend\modules\book\models\search\BookSearch;
use backend\my\yii2\AjaxCrudController;
use yii\widgets\ActiveForm;
use backend\modules\book\services\ImageRemove;

/**
 * IndexController implements the CRUD actions for Book model.
 */
class IndexController extends AjaxCrudController
{

    /**
     * @return bool|void
     */
    public function init()
    {
        parent::init();
        $this->modelClass = Book::className();
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
            $model->load(Yii::$app->request->post());
            if ($model->save()) {
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

    public function actionImageRemove()
    {
        return ImageRemove::run($this);
    }

}