<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularNgAttributesAsset
 * @package backend\assets
 */
class AngularNgAttributesAsset extends AssetBundle
{

    public $js = [
        'angular/ngAttributes.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}