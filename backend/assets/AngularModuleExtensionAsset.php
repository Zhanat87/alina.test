<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularModuleExtensionAsset
 * @package backend\assets
 */
class AngularModuleExtensionAsset extends AssetBundle
{

    public $js = [
        'angular/moduleExtension.js',
        'angular/moduleExtensionDirective.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}