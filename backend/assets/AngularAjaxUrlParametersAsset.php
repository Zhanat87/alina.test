<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularAjaxUrlParametersAsset
 * @package backend\assets
 */
class AngularAjaxUrlParametersAsset extends AssetBundle
{

    public $js = [
        'angular/angular_resource.js',
        'angular/angular_route.js',
        'angular/ajaxUrlParameters.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}