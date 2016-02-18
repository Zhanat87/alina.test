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
        'myfiles/css/lightbox.css',
        'myfiles/css/book.css',
    ];

    public $js = [
        'myfiles/js/lightbox.js',
        'myfiles/js/book.js',
    ];

    public $depends = [
        'backend\assets\AppAsset',
    ];

}