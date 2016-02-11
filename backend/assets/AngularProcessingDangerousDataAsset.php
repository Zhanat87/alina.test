<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularProcessingDangerousDataAsset
 * @package backend\assets
 */
class AngularProcessingDangerousDataAsset extends AssetBundle
{

    public $js = [
        'angular/angular_sanitize.js',
        'angular/processingDangerousData.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}