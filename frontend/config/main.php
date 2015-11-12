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
    'components' => [
        'request'      => [
            'baseUrl' => '',
        ],
        'urlManager'   => [
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
        'ipgeobase' => [
            'class' => 'himiklab\ipgeobase\IpGeoBase',
            'useLocalDB' => false,
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
    ],
    'params' => $params,
];
