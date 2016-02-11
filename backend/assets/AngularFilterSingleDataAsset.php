<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularFilterSingleDataAsset
 * @package backend\assets
 */
class AngularFilterSingleDataAsset extends AssetBundle
{

    public $js = [
        'angular/angular-locale_de-de.js',
        'angular/filterSingleData.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}