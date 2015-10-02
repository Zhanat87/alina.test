<?php

namespace backend\my\actions;

use Yii;
use yii\base\Action;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\BadRequestHttpException;

/**
 * Class DeleteAction
 * @package backend\my\actions
 */
class DeleteAction extends Action
{

    /**
     * @var
     */
    protected $_model;
    public $modelClass;

    /**
     * @throws BadRequestHttpException
     */
    public function init()
    {
        if (Yii::$app->request->isAjax && Yii::$app->request->isPost) {
            Yii::$app->response->format = Response::FORMAT_JSON;
        } else {
            throw new BadRequestHttpException('Запрос не ajax\'овский!!!');
        }
    }

    /**
     * @inheritdoc
     * @throws \yii\web\BadRequestHttpException
     */
    public function run($id)
    {
        if ($this->findModel($id)) {
            $this->_model->status = 0;
            /** @var \yii\db\ActiveRecord $this->_model */
            if ($this->_model->save(false)) {
                return Yii::$app->params['ajaxOk'];
            }
        }
    }

    /**
     * Finds the model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return \yii\db\ActiveRecord the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $class = $this->modelClass;
        if ($id !== null && ($this->_model = $class::findOne($id)) !== null) {
            return true;
        } else {
            throw new NotFoundHttpException('Запрашиваемая страница не существует.');
        }
    }

}