<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularAjaxUsingConfigInRequestsAsset
 * @package backend\assets
 */
class AngularAjaxUsingConfigInRequestsAsset extends AssetBundle
{

    public $js = [
        'angular/ajaxUsingConfigInRequests.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}