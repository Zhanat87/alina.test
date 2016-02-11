<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularControllerCommunicationAsset
 * @package backend\assets
 */
class AngularControllerCommunicationAsset extends AssetBundle
{

    public $js = [
        'angular/controllerCommunication.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}