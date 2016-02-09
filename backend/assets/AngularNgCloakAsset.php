<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularNgCloakAsset
 * @package backend\assets
 */
class AngularNgCloakAsset extends AssetBundle
{

    public $js = [
        'angular/ngCloak.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}