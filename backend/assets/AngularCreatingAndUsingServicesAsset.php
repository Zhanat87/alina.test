<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularCreatingAndUsingServicesAsset
 * @package backend\assets
 */
class AngularCreatingAndUsingServicesAsset extends AssetBundle
{

    public $js = [
        'angular/usingFactoryMethodLogService.js',
//        'angular/usingServiceMethodLogService.js',
//        'angular/usingProviderMethodLogService.js',
        'angular/creatingAndUsingServices.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}