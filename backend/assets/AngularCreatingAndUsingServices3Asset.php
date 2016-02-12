<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularCreatingAndUsingServices3Asset
 * @package backend\assets
 */
class AngularCreatingAndUsingServices3Asset extends AssetBundle
{

    public $js = [
        'angular/usingProviderMethodLogService.js',
        'angular/creatingAndUsingServices3.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}