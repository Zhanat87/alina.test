<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AngularDocumentServiceAsset
 * @package backend\assets
 */
class AngularDocumentServiceAsset extends AssetBundle
{

    public $js = [
        'angular/documentService.js',
    ];

    public $depends = [
        'backend\assets\AngularAsset',
    ];

}