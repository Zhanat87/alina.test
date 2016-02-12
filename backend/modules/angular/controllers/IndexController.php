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
        return $this->render('ng-repeat');
    }

    public function actionNgRepeat2()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return Book::find()->limit(10)->all();
    }

    public function actionProduct()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        switch (Yii::$app->request->method) {
            case 'GET' :
                $products = [
                    [
                        'name' => 'test ' . mt_rand(1, 100),
                        'price' => mt_rand(1, 100),
                    ],
                    [
                        'name' => 'test ' . mt_rand(1, 100),
                        'price' => mt_rand(1, 100),
                    ],
                    [
                        'name' => 'test ' . mt_rand(1, 100),
                        'price' => mt_rand(1, 100),
                    ],
                    [
                        'name' => 'test ' . mt_rand(1, 100),
                        'price' => mt_rand(1, 100),
                    ],
                    [
                        'name' => 'test ' . mt_rand(1, 100),
                        'price' => mt_rand(1, 100),
                    ],
                ];
                return $products;
                break;
            case 'POST' :
                return $this->getSuccessResponse($this->getParams());
                break;
            case 'PUT' :
                return $this->getSuccessResponse($this->getParams());
                break;
            case 'DELETE' :
                return $this->getSuccessResponse($this->getParams());
                break;
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

    public function actionWorkingWithOtherFrameworks()
    {
        return $this->render('working-with-other-frameworks');
    }

    public function actionFilterSingleData()
    {
        return $this->render('filter-single-data');
    }

    public function actionFilteringDataCollection()
    {
        return $this->render('filtering-data-collection');
    }

    public function actionFiltersChain()
    {
        return $this->render('filters-chain');
    }

    public function actionCustomFilters()
    {
        return $this->render('custom-filters');
    }

    public function actionCustomDirectives()
    {
        return $this->render('custom-directives');
    }

    public function actionJqLite()
    {
        return $this->render('jq-lite');
    }

    public function actionCreatingComplexDirectives()
    {
        return $this->render('creating-complex-directives');
    }

    public function actionManipulatingWithScope()
    {
        return $this->render('manipulating-with-scope');
    }

    public function actionModuleExtension()
    {
        return $this->render('module-extension');
    }

    public function actionModuleDependency()
    {
        return $this->render('module-dependency');
    }

    public function actionCreatingAndUsingServices()
    {
        return $this->render('creating-and-using-services');
    }

    public function actionCreatingAndUsingServices2()
    {
        return $this->render('creating-and-using-services2');
    }

    public function actionCreatingAndUsingServices3()
    {
        return $this->render('creating-and-using-services3');
    }

    public function actionBuiltInServicesList()
    {
        return $this->render('built-in-services-list');
    }

    public function actionWindowService()
    {
        return $this->render('window-service');
    }

    public function actionDocumentService()
    {
        return $this->render('document-service');
    }

    public function actionIntervalAndTimeoutServices()
    {
        return $this->render('interval-and-timeout-services');
    }

    public function actionLocationService()
    {
        return $this->render('location-service');
    }

    public function actionAnchorScrollService()
    {
        return $this->render('anchor-scroll-service');
    }

    public function actionLogService()
    {
        return $this->render('log-service');
    }

    public function actionHandlingExceptions()
    {
        return $this->render('handling-exceptions');
    }

    public function actionProcessingDangerousData()
    {
        return $this->render('processing-dangerous-data');
    }

    public function actionProcessingExpressions()
    {
        return $this->render('processing-expressions');
    }

    public function actionBasicAjax()
    {
        return $this->render('basic-ajax');
    }

    public function actionAjaxUsingConfigInRequests()
    {
        return $this->render('ajax-using-config-in-requests');
    }

    public function actionHttpProvider()
    {
        return $this->render('http-provider');
    }

    public function actionAjaxWithoutRest()
    {
        return $this->render('ajax-without-rest');
    }

    public function actionAjaxHttp()
    {
        return $this->render('ajax-http');
    }

    public function actionAjaxUsingResource()
    {
        return $this->render('ajax-using-resource');
    }

    public function actionAjaxServicesForViews()
    {
        return $this->render('ajax-services-for-views');
    }

    public function actionAjaxUrlParameters()
    {
        return $this->render('ajax-url-parameters');
    }

    public function actionTests()
    {
        return $this->render('tests');
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

}