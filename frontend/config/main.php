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
    'language' => 'ru-RU',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request'      => [
            'baseUrl' => '',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
        ],
        'urlManager'   => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'rules'           => [
                '' => 'mainpage/mainpage',
                'login' => 'user/security/login',
                'register' => 'user/registration/register',
                'logout' => 'user/security/logout',
                'profile' => 'user/settings/profile',
                'select_service' => 'services/services/select_service',
                'office' => 'office/office',
                'garage' => 'garage/garage',
                'add' => 'services/services/add',
                'add_to_sql' => 'services/services/add_to_sql',
                'request/<id:\d+>' => 'request/default/request/',
                'send_request' => 'request/default/send_request/',
                'message' => 'message/default',
            ],
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

    ],
    'modules' => [
        'mainpage' => [
            'class' => 'frontend\modules\mainpage\Mainpage',
        ],
        'garage' => [
            'class' => 'frontend\modules\garage\Garage',
        ],
        'services' => [
            'class' => 'frontend\modules\services\Services',
        ],
        'office' => [
            'class' => 'frontend\modules\office\Office',
        ],
        'news' => [
            'class' => 'frontend\modules\news\News',
        ],
        'offers' => [
            'class' => 'frontend\modules\offers\Offers',
        ],
        'flea_market' => [
            'class' => 'frontend\modules\flea_market\Flea_market',
        ],
        'profile' => [
            'class' => 'frontend\modules\profile\Profile',
        ],
        'request' => [
            'class' => 'frontend\modules\request\Request',
        ],
        'ajax' => [
            'class' => 'frontend\modules\ajax\Ajax',
        ],
        'message' => [
            'class' => 'frontend\modules\message\Message',
        ],
    ],
    'params' => $params,
];
