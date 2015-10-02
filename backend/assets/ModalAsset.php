<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class ModalAsset
 * @package backend\assets
 */
class ModalAsset extends AssetBundle
{

    public $css = [
        'centaurus/css/libs/nifty-component.css',
        'myfiles/css/modal.css',
    ];

    public $js = [
        'centaurus/js/modernizr.custom.js',
        'centaurus/js/classie.js',
        'centaurus/js/modalEffects.js',
        'myfiles/js/modal.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

}