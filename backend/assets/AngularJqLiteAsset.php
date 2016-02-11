<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularJqLiteAsset
 * @package backend\assets
 */
class AngularJqLiteAsset extends AssetBundle
{

    public $js = [
        'angular/jqLite.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}