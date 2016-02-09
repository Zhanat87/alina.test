<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularPartialViewsAsset
 * @package backend\assets
 */
class AngularPartialViewsAsset extends AssetBundle
{

    public $js = [
        'angular/partialViews.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}