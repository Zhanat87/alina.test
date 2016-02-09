<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularNgEventsAsset
 * @package backend\assets
 */
class AngularNgEventsAsset extends AssetBundle
{

    public $js = [
        'angular/ngEvents.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}