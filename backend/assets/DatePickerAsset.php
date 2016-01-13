<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class DatePickerAsset
 * @package backend\assets
 *
 * https://github.com/Eonasdan/bootstrap-datetimepicker
 * http://eonasdan.github.io/bootstrap-datetimepicker/
 */
class DatePickerAsset extends AssetBundle
{

    public $basePath = '@webroot/bootstrap-datetimepicker/';
    public $baseUrl = '@web/bootstrap-datetimepicker/';

    public $css = [
        'css/bootstrap-datetimepicker.min.css',
    ];

    public $js = [
        'js/moment.min.js',
        'js/bootstrap-datetimepicker.min.js',
        'js/locales/bootstrap-datetimepicker.ru.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}