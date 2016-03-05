<?php

namespace frontend\modules\angular;

use Yii;

class Angular extends \yii\base\Module
{

    public $controllerNamespace = 'frontend\modules\angular\controllers';

    public function init()
    {
        parent::init();
        $this->layout = false;
        Yii::$app->request->enableCsrfValidation = false;
        Yii::$app->request->enableCsrfCookie = false;
        Yii::$app->request->enableCookieValidation = false;
        // custom initialization title goes here
    }

}