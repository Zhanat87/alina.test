<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

class CancelBtnAsset extends AssetBundle
{

    public $css = [
        'myfiles/css/cancelBtn.css',
    ];

    public $js = [
        'myfiles/js/cancelBtn.js',
    ];

    public $depends = [
        'backend\assets\AppAsset',
    ];

}