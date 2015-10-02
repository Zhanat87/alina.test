<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

class GridViewAsset extends AssetBundle
{

    public $css = [
        'myfiles/css/myGridView.css',
    ];

    public $js = [
        'myfiles/js/myGridView.js',
    ];

    public $depends = [
        'backend\assets\AppAsset',
    ];

}