<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularControllerInheritanceAsset
 * @package backend\assets
 */
class AngularControllerInheritanceAsset extends AssetBundle
{

    public $js = [
        'angular/controllerInheritance.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}