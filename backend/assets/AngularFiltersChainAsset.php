<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularFiltersChainAsset
 * @package backend\assets
 */
class AngularFiltersChainAsset extends AssetBundle
{

    public $js = [
        'angular/filtersChain.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}