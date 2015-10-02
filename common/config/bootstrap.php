<?php

mb_internal_encoding('UTF-8');
mb_regex_encoding('UTF-8');
mb_http_input('UTF-8');
mb_http_output('UTF-8');
setlocale(LC_ALL, 'ru_RU.UTF-8');
setlocale(LC_NUMERIC, 'en_US.UTF-8');
ini_set('date.timezone', YII_DEBUG ? 'Asia/Almaty' : 'Europe/Moscow');

defined('DS') or define('DS', DIRECTORY_SEPARATOR);
defined('SITE_URL') or define('SITE_URL', 'lis.local');

if (YII_DEBUG) {
    ini_set('error_reporting', E_ALL);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

// set aliases
Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('root', dirname(__DIR__) . '/..');
Yii::setAlias('webRoot', 'http://lis.local');