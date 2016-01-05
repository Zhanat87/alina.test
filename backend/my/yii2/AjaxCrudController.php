<?php

namespace backend\my\yii2;

use Yii;
use yii\web\NotFoundHttpException;
use backend\my\actions\SwitchAction;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use common\my\yii2\ActiveRecord;
use yii\web\Response;

/**
 * Class AjaxCrudController
 * @package backend\my\yii2
 */
class AjaxCrudController extends Controller
{

    public $modelClass;

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            $this->setResponseFormat();
            return true;
        }
        return false;
    }

    private function setResponseFormat()
    {
        if (!in_array($this->action->id, ['index', 'view'])) {
            Yii::$app->response->format = Response::FORMAT_JSON;
        }
        if (in_array($this->action->id, ['create', 'update']) && !Yii::$app->request->isPost) {
            Yii::$app->response->format = Response::FORMAT_HTML;
        }
    }

    public function actions()
    {
        return [
            SwitchAction::ACTION_DELETE => [
                'class' => SwitchAction::className(),
            ],
            SwitchAction::ACTION_RESTORE => [
                'class' => SwitchAction::className(),
            ],
            SwitchAction::ACTION_REMOVE => [
                'class' => SwitchAction::className(),
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
     * Finds the model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ActiveRecord the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
        /** @var ActiveRecord $class */
        $class = $this->modelClass;
        if (($model = $class::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}