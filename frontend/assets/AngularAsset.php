<?php
/**
 * Created by PhpStorm.
 * User: zhanat
 * Date: 3/7/16
 * Time: 10:08 PM
 */

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

class AngularAsset extends AssetBundle
{

    public $sourcePath = '@bower';

    public $js = [
        'angular/angular.js',
        'angular-route/angular-route.js',
        'angular-strap/dist/angular-strap.js',
    ];

    public $jsOptions = [
        // load angular as soon as possible (asap)
        'position' => View::POS_HEAD,
    ];

}