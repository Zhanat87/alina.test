<?php

namespace backend\modules\angular\controllers;

use Yii;
use backend\my\yii2\Controller;
use yii\web\Response;
use backend\modules\book\models\Book;

/**
 * IndexController implements the CRUD actions for Book model.
 */
class IndexController extends Controller
{

    public function actionNgRepeat()
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return Book::find()->limit(10)->all();
        } else {
            return $this->render('ng-repeat');
        }
    }

    public function actionModule()
    {
        return $this->render('module');
    }

    public function actionOneBind()
    {
        return $this->render('one-bind');
    }

    public function actionTwoBind()
    {
        return $this->render('two-bind');
    }

    public function actionBuiltInVariables()
    {
        return $this->render('built-in-variables');
    }

}