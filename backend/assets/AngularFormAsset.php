<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularFormAsset
 * @package backend\assets
 */
class AngularFormAsset extends AssetBundle
{

    public $js = [
        'angular/form.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}