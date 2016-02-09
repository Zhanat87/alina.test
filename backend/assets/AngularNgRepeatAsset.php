<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularNgRepeatAsset
 * @package backend\assets
 */
class AngularNgRepeatAsset extends AssetBundle
{

    public $js = [
        'angular/ngRepeat.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}