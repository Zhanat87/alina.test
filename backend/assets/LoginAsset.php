<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class LoginAsset
 * @package backend\assets
 */
class LoginAsset extends AssetBundle
{

    public $css = [
        'centaurus/css/libs/font-awesome.css',
        'centaurus/css/libs/nanoscroller.css',
        'centaurus/css/compiled/theme_styles.css',
        'http:///fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400',
        'myfiles/css/login.css',
    ];

    public $js = [
        'centaurus/js/jquery.nanoscroller.min.js',
        'centaurus/js/scripts.js',
        'myfiles/js/login.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}