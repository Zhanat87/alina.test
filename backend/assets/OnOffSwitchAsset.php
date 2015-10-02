<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class OnOffSwitchAsset
 * @package backend\assets
 *
 * @link https://proto.io/freebies/onoff/
 */
class OnOffSwitchAsset extends AssetBundle
{

    public $css = [
        'myfiles/css/onOffSwitch.css',
    ];

    public $js = [
        'myfiles/js/onOffSwitch.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}