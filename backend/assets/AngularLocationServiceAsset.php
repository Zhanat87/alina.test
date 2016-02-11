<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularLocationServiceAsset
 * @package backend\assets
 */
class AngularLocationServiceAsset extends AssetBundle
{

    public $js = [
        'angular/locationService.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}