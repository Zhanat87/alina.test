<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularFilterAsset
 * @package backend\assets
 */
class AngularFilterAsset extends AssetBundle
{

    public $js = [
        'angular/filter.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}