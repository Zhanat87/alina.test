<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularCustomDirectivesAsset
 * @package backend\assets
 */
class AngularCustomDirectivesAsset extends AssetBundle
{

    public $js = [
        'angular/customDirectives.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}