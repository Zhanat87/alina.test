<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularBuiltInVariablesAsset
 * @package backend\assets
 */
class AngularBuiltInVariablesAsset extends AssetBundle
{

    public $js = [
        'angular/builtInVariables.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}