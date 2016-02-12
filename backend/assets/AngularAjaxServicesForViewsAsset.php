<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularAjaxServicesForViewsAsset
 * @package backend\assets
 */
class AngularAjaxServicesForViewsAsset extends AssetBundle
{

    public $js = [
        'angular/angular_resource.js',
        'angular/angular_route.js',
        'angular/ajaxServicesForViews.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}