<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

class GridViewConstAsset extends AssetBundle
{

    public $css = [
        'myfiles/css/gridViewConst.css',
    ];

    public $js = [
        'myfiles/js/gridViewConst.js',
    ];

    public $depends = [
        'backend\assets\AppAsset',
    ];

}