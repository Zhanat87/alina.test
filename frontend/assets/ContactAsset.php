<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class ContactAsset extends AssetBundle
{

    public $js = [
        'js/contact.js',
    ];

    public $depends = [
        AppAsset::class,
    ];

}