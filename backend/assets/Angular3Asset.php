<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularAsset
 * @package backend\assets
 */
class Angular1Asset extends AssetBundle
{

    public $js = [
        'angular/.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}