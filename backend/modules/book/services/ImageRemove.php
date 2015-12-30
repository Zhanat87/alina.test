<?php

namespace backend\modules\book\services;

use backend\modules\book\controllers\IndexController;
use yii\web\Response;
use Yii;

/**
 * Created by PhpStorm.
 * User: zhanat
 * Date: 12/30/15
 * Time: 7:42 PM
 */
class ImageRemove
{

    public static function run(IndexController $indexController)
    {
        $indexController->isAjax();
        if ($indexController->csrfValidate($indexController->getParam('_csrf'))) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $model = $indexController->findModel($indexController->getParam('id'));
            unlink($model->getImagePath());
            unlink($model->getThumbPath());
            $model->image = null;
            return Yii::$app->params['response'][$model->save() ? 'success' : 'error'];
        }
    }

}