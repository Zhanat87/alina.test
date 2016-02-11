<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularFilteringDataCollectionAsset
 * @package backend\assets
 */
class AngularFilteringDataCollectionAsset extends AssetBundle
{

    public $js = [
        'angular/filteringDataCollection.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}