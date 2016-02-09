<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularValidationAsset
 * @package backend\assets
 */
class AngularValidationAsset extends AssetBundle
{

    public $js = [
        'angular/validation.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}