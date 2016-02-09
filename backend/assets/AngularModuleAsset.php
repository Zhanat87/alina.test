<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularModuleAsset
 * @package backend\assets
 */
class AngularModuleAsset extends AssetBundle
{

    public $css = [
        'angular/css/module.css',
    ];

    public $js = [
        'angular/module.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}