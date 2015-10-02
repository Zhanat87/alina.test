<?php

namespace backend\assets;

use backend\my\yii2\AssetBundle;

/**
 * Class AppAsset
 * @package backend\assets
 */
class AppAsset extends AssetBundle
{

    public $css = [
        'centaurus/css/libs/font-awesome.css',
        'centaurus/css/libs/nanoscroller.css',
        'centaurus/css/compiled/theme_styles.css',
        'centaurus/css/libs/fullcalendar.css',
        'centaurus/css/compiled/calendar.css',
        'centaurus/css/libs/morris.css',
        'centaurus/css/libs/daterangepicker.css',
        'centaurus/css/libs/jquery-jvectormap-1.2.2.css',
        'http:///fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400',
        'myfiles/css/cloud.css',
    ];

    public $js = [
        'centaurus/js/demo-skin-changer.js',
        'centaurus/js/jquery.nanoscroller.min.js',
        'centaurus/js/jquery-ui.custom.min.js',
        'centaurus/js/fullcalendar.min.js',
        'centaurus/js/jquery.slimscroll.min.js',
        'centaurus/js/raphael-min.js',
        'centaurus/js/morris.min.js',
        'centaurus/js/moment.min.js',
        'centaurus/js/daterangepicker.js',
        'centaurus/js/jquery-jvectormap-1.2.2.min.js',
        'centaurus/js/jquery-jvectormap-world-merc-en.js',
        'centaurus/js/gdp-data.js',
        'centaurus/js/flot/jquery.flot.js',
        'centaurus/js/flot/jquery.flot.min.js',
        'centaurus/js/flot/jquery.flot.pie.min.js',
        'centaurus/js/flot/jquery.flot.stack.min.js',
        'centaurus/js/flot/jquery.flot.resize.min.js',
        'centaurus/js/flot/jquery.flot.time.min.js',
        'centaurus/js/flot/jquery.flot.threshold.js',
        'centaurus/js/jquery.countTo.js',
        'centaurus/js/scripts.js',
        'centaurus/js/pace.min.js',
        'maskedinput/jquery.maskedinput.min.js',
        'myfiles/js/cloud.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

}