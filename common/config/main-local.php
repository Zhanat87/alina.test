<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=alina2',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'enableSchemaCache' => YII_DEBUG ? false : true,
            'schemaCacheDuration' => YII_DEBUG ? 0: 86400,
        ],
    ],
];
