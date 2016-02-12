<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularTestsAsset
 * @package backend\assets
 */
class AngularTestsAsset extends AssetBundle
{

    public $js = [
        'angular/angular-mocks.js',
        'angular/karma.config.js',
        'angular/tests.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}