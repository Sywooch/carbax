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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
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
            'showScriptName' => false,
            'enableStrictParsing' => false,
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
                'my_requests' => 'request/default/all_requests',
                'request_type' => 'request/default/request_type',
                'favorites' => 'favorites/default',
                'complaint' => 'complaint/default/complaint',
                'offers' => '/offers/offers',
                'offers/create' => 'offers/offers/create',

                'flea-market/view' => 'flea_market/default/view',
                'flea-market' => 'flea_market/default',
                'flea-market/sale_auto' => 'flea_market/default/sale_auto',
                'flea-market/sale_parts' => 'flea_market/default',
                'flea-market/search' => 'flea_market/default/search',

                /*[
                    'pattern' => '<controller>/<action>/<id:\d+>',
                    'route' => '<controller>/<action>',
                ],*/

                'news' => 'news/news',
                'services' => 'services/services',
            ],
        ],
        /*'urlManagerFrontend' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => '',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],*/
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
        'complaint' => [
            'class' => 'frontend\modules\complaint\Complaint',
        ],
        'favorites' => [
            'class' => 'frontend\modules\favorites\Favorites',
        ],
        'static_pages' => [
            'class' => 'frontend\modules\static_pages\Static_pages',
        ],
    ],
    'params' => $params,
];
