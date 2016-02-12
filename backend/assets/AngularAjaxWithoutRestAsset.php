<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularAjaxWithoutRestAsset
 * @package backend\assets
 */
class AngularAjaxWithoutRestAsset extends AssetBundle
{

    public $js = [
        'angular/ajaxWithoutRest.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}