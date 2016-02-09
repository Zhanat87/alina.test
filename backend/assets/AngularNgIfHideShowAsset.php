<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularNgIfHideShowAsset
 * @package backend\assets
 */
class AngularNgIfHideShowAsset extends AssetBundle
{

    public $js = [
        'angular/ngIfHideShow.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}