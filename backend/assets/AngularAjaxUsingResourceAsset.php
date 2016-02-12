<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularAjaxUsingResourceAsset
 * @package backend\assets
 */
class AngularAjaxUsingResourceAsset extends AssetBundle
{

    public $js = [
        'angular/angular_resource.js',
        'angular/ajaxUsingResource.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}