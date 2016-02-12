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
        'angular/creatingAndUsingServices2.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}