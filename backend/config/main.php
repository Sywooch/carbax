<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'group_services' => [
            'class' => 'backend\modules\group_services\Group_services',
        ],
        'service_type' => [
            'class' => 'backend\modules\service_type\ServiceType',
        ],
        'service_types' => [
            'class' => 'backend\modules\service_types\Service_types',
        ],
        'brand_cars' => [
            'class' => 'backend\modules\brand_cars\Brand_cars',
        ],
        'media' => [
            'class' => 'backend\modules\media\Media',
        ],
         'news' => [
            'class' => 'backend\modules\news\News',
        ],
        'comfort_zone' => [
            'class' => 'backend\modules\comfort_zone\Comfort_zone',
        ],
    ],
    'components' => [
        'request' => [
            'baseUrl' => '/secure',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'service_type' => 'service_type/service_type',
                'group_services' => 'group_services/group_services',
                'service_types' => '/service_types/service_types',
                'brand_cars' => 'brand_cars/brand_cars',
                'comfort_zone' => '/comfort_zone/comfort_zone/',
                'news' => '/news/news',
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
    'params' => $params,
];
