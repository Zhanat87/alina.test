<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    'pageSize' => 20,
    'pageSizeMin' => 20,
    'pageSizeMax' => 1000000000,
    'duration' => [
        'month' => 25920000000,
        'week' => 604800,
        'day' => 86400,
        'hour' => 3600,
        'minute' => 60,
    ],
    'format' => [
        'dateTime' => 'd/m/Y (H:i)',
        'date' => 'd/m/Y',
        'time' => 'H:i:s',
        'db' => [
            'dateTime' => 'Y-m-d H:i:s',
            'date' => 'Y-m-d',
        ],
    ],
    'response' => [
        'success' => [
            'code' => 200,
            'status' => 'ok',
            'message' => 'Всё ништяк!!!',
        ],
        'error' => [
            'code' => 400,
            'status' => 'error',
        ],
        'empty' => [
            'code' => 200,
            'status' => 'empty',
        ],
    ],
    'domainName' => 'http://alina.test/',
    'backendDomainName' => 'http://backend.alina.test/',
];
