<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'angular' => [
            'class' => 'frontend\modules\angular\Angular',
        ],
    ],
    'components' => [
        'user'         => [
            'identityClass'   => 'backend\modules\user\models\User',
            'enableAutoLogin' => TRUE,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager'   => [
            'class'               => 'yii\web\UrlManager',
            'enablePrettyUrl'     => TRUE,
            'showScriptName'      => FALSE,
            'enableStrictParsing' => TRUE,
            'rules'               => [
                '/'                                                                        => 'site/index',
                '<controller:[a-zA-Z0-9-]+>/<action:[a-zA-Z0-9-]+>'                        => '<controller>/<action>',
                '<controller:\w+>/<action:(update|view|delete)>/<id:\d+>'                  => '<controller>/<action>',
                '<module:[a-zA-Z0-9-]+>/<controller:[a-zA-Z0-9-]+>/<action:[a-zA-Z0-9-]+>' =>
                    '<module>/<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:(update|view|delete)>/<id:\d+>'     =>
                    '<module>/<controller>/<action>',
            ],
        ],
    ],
    'params' => $params,
];
