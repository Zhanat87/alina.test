<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularWindowServiceAsset
 * @package backend\assets
 */
class AngularWindowServiceAsset extends AssetBundle
{

    public $js = [
        'angular/windowService.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}