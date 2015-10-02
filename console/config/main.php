<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'lis console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'gii'],
    'controllerNamespace' => 'console\controllers',
    'modules' => [
        'gii' => 'yii\gii\Module',
    ],
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['info'],
                    'categories' => ['appErrors'],
                    'logFile' => '@app/runtime/logs/appErrors.log',
                    'maxFileSize' => 1024 * 2,
                    'maxLogFiles' => 20,
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => [
                '<controller:[a-zA-Z0-9-]+>/<action:[a-zA-Z0-9-]+>' =>
                    '<controller>/<action>',
                '<controller:[a-zA-Z0-9-]+>/<action:[a-zA-Z0-9-]+>/<id:\d+>' =>
                    '<controller>/<action>',
                '<module:[a-zA-Z0-9-]+>/<controller:[a-zA-Z0-9-]+>/<action:[a-zA-Z0-9-]+>' =>
                    '<module>/<controller>/<action>',
                '<module:[a-zA-Z0-9-]+>/<controller:[a-zA-Z0-9-]+>/<action:[a-zA-Z0-9-]+>/<id:\d+>' =>
                    '<module>/<controller>/<action>',
            ],
        ],
    ],
    'controllerMap' => [
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'templateFile' => '@app/my/templates/migration.php',
        ],
    ],
    'params' => $params,
];
