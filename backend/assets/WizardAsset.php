<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class WizardAsset
 * @package backend\assets
 */
class WizardAsset extends AssetBundle
{

    /**
     * @var array
     */
    public $css = [
        'centaurus/css/compiled/wizard.css',
    ];

    /**
     * @var array
     */
    public $js = [
        'centaurus/js/wizard.js',
    ];

    /**
     * @var array
     */
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}