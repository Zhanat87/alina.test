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
//        'myfiles/css/book.css',
    ];

    public $js = [
        'angular/angular.js',
        'angular/ngRepeat.js',
    ];

    public $depends = [
        'backend\assets\AppAsset',
    ];

}