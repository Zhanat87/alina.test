<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class Select2Asset
 * @package backend\assets
 *
 * http://ivaynberg.github.io/select2/
 */
class Select2Asset extends AssetBundle
{

    public $css = [
        'select2/select2.min.css',
        'select2/select2-corrects.css',
    ];

    public $js = [
        'select2/select2.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}