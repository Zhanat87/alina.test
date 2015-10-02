<?php

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id'                  => 'lis backend',
    'basePath'            => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap'           => ['log'],
    'homeUrl'             => '/user/deny/index',
    'defaultRoute'        => '/user/deny/index',
    'layoutPath'          => '@app/layouts',
    'modules'             => [
        'user'          => [
            'class' => 'backend\modules\user\User',
        ],
        'rbac'          => [
            'class' => 'backend\modules\rbac\Rbac',
        ],
        'news'          => [
            'class' => 'backend\modules\news\News',
        ],
    ],
    'components'          => [
        'user'         => [
            'identityClass'   => 'backend\modules\user\models\User',
            'enableAutoLogin' => TRUE,
            'loginUrl'        => ['/user/allow/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'user/allow/error',
        ],
        'log'          => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager'   => [
            'class'               => 'yii\web\UrlManager',
            'enablePrettyUrl'     => TRUE,
            'showScriptName'      => FALSE,
            'enableStrictParsing' => TRUE,
            'rules'               => [
                '/'                                                                        => 'user/deny/index',
                'login'                                                                    => 'user/allow/login',
                'logout'                                                                   => 'user/deny/logout',
                'profile'                                                                  => 'user/deny/profile',
                'profile-edit'                                                             => 'user/deny/profile-edit',
                'reset-password'                                                           => 'user/allow/reset-password',
                '<controller:[a-zA-Z0-9-]+>/<action:[a-zA-Z0-9-]+>'                        => '<controller>/<action>',
                '<controller:\w+>/<action:(update|view|delete)>/<id:\d+>'                  => '<controller>/<action>',
                '<module:[a-zA-Z0-9-]+>/<controller:[a-zA-Z0-9-]+>/<action:[a-zA-Z0-9-]+>' =>
                    '<module>/<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:(update|view|delete)>/<id:\d+>'     =>
                    '<module>/<controller>/<action>',
            ],
        ],
        'access'       => [
            'class' => 'backend\my\app\Access',
        ],
        'assetManager' => [
            'class' => 'yii\web\AssetManager',
            'appendTimestamp' => true,
        ],
    ],
    'params'              => $params,
];