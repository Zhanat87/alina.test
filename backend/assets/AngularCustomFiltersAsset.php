<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularCustomFiltersAsset
 * @package backend\assets
 */
class AngularCustomFiltersAsset extends AssetBundle
{

    public $js = [
        'angular/customFilters.js',
        'angular/customFilters2.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}