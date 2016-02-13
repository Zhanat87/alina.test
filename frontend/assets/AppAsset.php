<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/site.css',
        'css/style.css',
    ];

    public $js = [
        'js/angular-1.5.0.js',
//        'js/angular_resource.js',
//        'js/angular_route.js',
//        'js/angular_sanitize.js',
        'js/script.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

}