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

    public function actionPartialViews()
    {
        return $this->render('partial-views');
    }

    public function actionPartial($template)
    {
        return $this->renderPartial('partial_views/' . $template);
    }

    public function actionNgCloak()
    {
        return $this->render('ng-cloak');
    }

    public function actionNgIfHideShow()
    {
        return $this->render('ng-if-hide-show');
    }

    public function actionNgClassStyle()
    {
        return $this->render('ng-class-style');
    }

    public function actionNgEvents()
    {
        return $this->render('ng-events');
    }

    public function actionNgAttributes()
    {
        return $this->render('ng-attributes');
    }

    public function actionFilter()
    {
        return $this->render('filter');
    }

    public function actionValidation()
    {
        return $this->render('validation');
    }

    public function actionForm()
    {
        return $this->render('form');
    }

    public function actionBasicController()
    {
        return $this->render('basic-controller');
    }

    public function actionControllerCommunication()
    {
        return $this->render('controller-communication');
    }

    public function actionControllerInheritance()
    {
        return $this->render('controller-inheritance');
    }

    public function actionMultipleControllers()
    {
        return $this->render('multiple-controllers');
    }

//    public function action()
//    {
//        return $this->render('');
//    }
//
//    public function action()
//    {
//        return $this->render('');
//    }
//
//    public function action()
//    {
//        return $this->render('');
//    }
//
//    public function action()
//    {
//        return $this->render('');
//    }
//
//    public function action()
//    {
//        return $this->render('');
//    }
//
//    public function action()
//    {
//        return $this->render('');
//    }
//
//    public function action()
//    {
//        return $this->render('');
//    }
//
//    public function action()
//    {
//        return $this->render('');
//    }
//
//    public function action()
//    {
//        return $this->render('');
//    }
//
//    public function action()
//    {
//        return $this->render('');
//    }
//
//    public function action()
//    {
//        return $this->render('');
//    }
//
//    public function action()
//    {
//        return $this->render('');
//    }
//
//    public function action()
//    {
//        return $this->render('');
//    }
//
//    public function action()
//    {
//        return $this->render('');
//    }

}