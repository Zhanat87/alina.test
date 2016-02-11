<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularHandlingExceptionsAsset
 * @package backend\assets
 */
class AngularHandlingExceptionsAsset extends AssetBundle
{

    public $js = [
        'angular/handlingExceptions.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}