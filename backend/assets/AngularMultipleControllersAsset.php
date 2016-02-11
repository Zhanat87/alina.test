<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularMultipleControllersAsset
 * @package backend\assets
 */
class AngularMultipleControllersAsset extends AssetBundle
{

    public $js = [
        'angular/multipleControllers.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}