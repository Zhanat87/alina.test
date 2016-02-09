<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularAsset
 * @package backend\assets
 */
class AngularAsset extends AssetBundle
{

    public $js = [
//        'angular/angular.js',
//        'angular/angular.min.js',
        'angular/angular-1.5.0.js',
    ];

    public $depends = [
        'backend\assets\AppAsset',
    ];

}