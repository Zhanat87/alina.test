<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularCurrencyFilterAsset
 * @package backend\assets
 */
class AngularCurrencyFilterAsset extends AssetBundle
{

    public $js = [
        'angular/currencyFilter.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}