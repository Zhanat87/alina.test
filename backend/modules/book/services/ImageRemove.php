<?php

namespace backend\modules\book\services;

use backend\modules\book\controllers\IndexController;
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
        if ($indexController->csrfValidate($indexController->getParam('_csrf'))) {
            $model = $indexController->findModel($indexController->getParam('id'));
            $model->cleanFiles();
            $model->image = null;
            return Yii::$app->params['response'][$model->save(false) ? 'success' : 'error'];
        }
    }

}