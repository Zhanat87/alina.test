<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class UserAsset
 * @package backend\assets
 */
class UserAsset extends AssetBundle
{

    public $css = [
        'myfiles/css/user.css',
    ];

    public $js = [
        'centaurus/js/jquery.pwstrength.js',
        'myfiles/js/user.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

}