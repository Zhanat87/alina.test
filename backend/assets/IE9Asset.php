<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class IE9Asset
 * @package backend\assets
 */
class IE9Asset extends AssetBundle
{

    public $jsOptions = ['condition' => 'lt IE9'];

    public $js = [
        'centaurus/js/html5shiv.js',
        'centaurus/js/respond.min.js',
    ];

}