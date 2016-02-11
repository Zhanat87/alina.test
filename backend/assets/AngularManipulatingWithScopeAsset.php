<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularManipulatingWithScopeAsset
 * @package backend\assets
 */
class AngularManipulatingWithScopeAsset extends AssetBundle
{

    public $js = [
        'angular/manipulatingWithScope.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}