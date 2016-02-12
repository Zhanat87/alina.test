<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularHttpProviderAsset
 * @package backend\assets
 */
class AngularHttpProviderAsset extends AssetBundle
{

    public $js = [
        'angular/httpProvider.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}