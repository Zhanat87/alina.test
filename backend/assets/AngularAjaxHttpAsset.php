<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularAjaxHttpAsset
 * @package backend\assets
 */
class AngularAjaxHttpAsset extends AssetBundle
{

    public $js = [
        'angular/ajaxHttp.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}