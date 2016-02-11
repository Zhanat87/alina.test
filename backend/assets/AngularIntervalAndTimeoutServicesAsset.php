<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularIntervalAndTimeoutServicesAsset
 * @package backend\assets
 */
class AngularIntervalAndTimeoutServicesAsset extends AssetBundle
{

    public $js = [
        'angular/intervalAndTimeoutServices.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}