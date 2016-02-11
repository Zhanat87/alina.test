<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularAnchorScrollServiceAsset
 * @package backend\assets
 */
class AngularAnchorScrollServiceAsset extends AssetBundle
{

    public $js = [
        'angular/anchorScrollService.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}