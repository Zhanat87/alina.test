<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularAsset
 * @package backend\assets
 */
class AngularAsset extends AssetBundle
{

    public $css = [
        'angular/css/module.css',
    ];

    public $js = [
        'angular/angular.js',
        'angular/ngRepeat.js',
        'angular/module.js',
    ];

    public $depends = [
        'backend\assets\AppAsset',
    ];

}