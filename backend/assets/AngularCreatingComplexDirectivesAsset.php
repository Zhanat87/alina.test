<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularCreatingComplexDirectivesAsset
 * @package backend\assets
 */
class AngularCreatingComplexDirectivesAsset extends AssetBundle
{

    public $js = [
        'angular/creatingComplexDirectives.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}