<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularBasicAjaxAsset
 * @package backend\assets
 */
class AngularBasicAjaxAsset extends AssetBundle
{

    public $js = [
        'angular/basicAjax.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}