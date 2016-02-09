<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularNgClassStyleAsset
 * @package backend\assets
 */
class AngularNgClassStyleAsset extends AssetBundle
{

    public $js = [
        'angular/ngClassStyle.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}