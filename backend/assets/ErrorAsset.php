<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class ErrorAsset
 * @package backend\assets
 */
class ErrorAsset extends AssetBundle
{

    public $css = [
        'centaurus/css/libs/font-awesome.css',
        'centaurus/css/compiled/theme_styles.css',
        'http:///fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400',
    ];

    public $js = [
        'centaurus/js/scripts.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}