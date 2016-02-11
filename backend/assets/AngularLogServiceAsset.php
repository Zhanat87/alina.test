<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularLogServiceAsset
 * @package backend\assets
 */
class AngularLogServiceAsset extends AssetBundle
{

    public $js = [
        'angular/logService.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}