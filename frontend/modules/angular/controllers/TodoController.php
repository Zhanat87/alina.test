<?php

namespace frontend\modules\angular\controllers;

use Yii;
use common\my\yii2\Controller;
use yii\web\Response;
use frontend\modules\angular\models\Todo;

class TodoController extends Controller
{

    public function init()
    {
        parent::init();
        if (!Todo::getAll()) {
            $data = [
                ["action" => "Buy Flowers", "done" => false],
                ["action" => "Get Shoes", "done" => false],
                ["action" => "Collect Tickets", "done" => true],
                ["action" => "Call Joe", "done" => false],
                ["action" => "test", "done" => false],
            ];
            foreach ($data as $item) {
                $todoModel = new Todo();
                $todoModel->action = $item['action'];
                $todoModel->done = $item['done'];
                $todoModel->save();
            }
        }
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionList()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return Todo::getAll();
    }

    public function actionAdd()
    {
        if (Yii::$app->request->isPost) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $todoModel = new Todo();
            $todoModel->action = $this->getParam('action');
            if ($todoModel->save()) {
                return $this->getSuccessResponse();
            } else {
                return $this->getModelErrorResponse($todoModel->getErrors());
            }
        }
        return $this->getBadRequestResponse();
    }

    public function actionRemove()
    {
        if (Yii::$app->request->isPost) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return Todo::deleteAll(['_id' => $this->getParam('_id')]) ?
                $this->getSuccessResponse() : $this->getErrorResponse();
        }
        return $this->getBadRequestResponse();
    }

}