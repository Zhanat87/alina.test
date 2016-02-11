<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularWorkingWithOtherFrameworksAsset
 * @package backend\assets
 */
class AngularWorkingWithOtherFrameworksAsset extends AssetBundle
{

    public $js = [
        'angular/workingWithOtherFrameworks.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}