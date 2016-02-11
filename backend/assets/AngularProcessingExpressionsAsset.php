<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularProcessingExpressionsAsset
 * @package backend\assets
 */
class AngularProcessingExpressionsAsset extends AssetBundle
{

    public $js = [
        'angular/processingExpressions.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}