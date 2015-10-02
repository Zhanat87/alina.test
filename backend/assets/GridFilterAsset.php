<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class GridFilterAsset
 * @package backend\assets
 */
class GridFilterAsset extends AssetBundle
{

    public $css = [
        'myfiles/css/gridFilter.css',
    ];

    public $js = [
        'myfiles/js/gridFilter.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

}