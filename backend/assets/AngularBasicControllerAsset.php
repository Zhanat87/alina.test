<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularBasicControllerAsset
 * @package backend\assets
 */
class AngularBasicControllerAsset extends AssetBundle
{

    public $js = [
        'angular/basicController.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}