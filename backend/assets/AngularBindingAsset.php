<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularBindingAsset
 * @package backend\assets
 */
class AngularBindingAsset extends AssetBundle
{

    public $js = [
        'angular/oneTwoBind.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}