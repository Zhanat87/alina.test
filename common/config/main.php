<?php

return [
    'bootstrap'  => ['log'],
    'language'   => 'ru',
    'timezone'   => YII_DEBUG ? 'Asia/Almaty' : 'Europe/Moscow',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache'       => [
            'class' => YII_DEBUG ? 'yii\caching\FileCache' : 'yii\caching\ApcCache',
        ],
        'debugger'    => [
            'class' => 'common\my\helpers\Debugger',
        ],
        'current'     => [
            'class' => 'common\my\helpers\Current',
        ],
        'exception'   => [
            'class' => 'common\my\helpers\Exception',
        ],
        'mailer'      =>
            [
                'class'            => 'yii\swiftmailer\Mailer',
                'viewPath'         => '@app/mail',
                'htmlLayout'       => '@app/mail/layouts/html',
                'useFileTransport' => FALSE,
            ],
        'authManager' => [
            'class'        => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest'],
            'cache'        => 'cache',
        ],
    ],
];