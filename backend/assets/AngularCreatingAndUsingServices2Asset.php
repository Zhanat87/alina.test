<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularCreatingAndUsingServices2Asset
 * @package backend\assets
 */
class AngularCreatingAndUsingServices2Asset extends AssetBundle
{

    public $js = [
        'angular/usingServiceMethodLogService.js',
        'angular/creatingAndUsingServices.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}