<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class NewsAsset extends AssetBundle
{

    public $js = [
        'js/news.js',
    ];

    public $depends = [
        AppAsset::class,
    ];

}