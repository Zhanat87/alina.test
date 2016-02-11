<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularModuleDependencyAsset
 * @package backend\assets
 */
class AngularModuleDependencyAsset extends AssetBundle
{

    public $js = [
        'angular/moduleDependencyDirective.js',
        'angular/moduleDependency.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}