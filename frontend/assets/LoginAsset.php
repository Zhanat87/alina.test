<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class LoginAsset extends AssetBundle
{

    public $js = [
        'js/login.js',
    ];

    public $depends = [
        AppAsset::class,
    ];

}