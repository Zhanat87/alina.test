<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class BookAsset
 * @package backend\assets
 */
class BookAsset extends AssetBundle
{

    public $css = [
        'myfiles/css/book.css',
    ];

    public $js = [
        'myfiles/js/jquery.elevateZoom-3.0.8.min.js',
        'myfiles/js/book.js',
    ];

    public $depends = [
        'backend\assets\AppAsset',
    ];

}