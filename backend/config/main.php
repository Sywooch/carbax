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
    'language' => 'ru-RU',
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
        'auto_type' => [
            'class' => 'backend\modules\auto_type\Auto_type',
        ],
        'category_news' => [
            'class' => 'backend\modules\category_news\Category_news',
        ],
        'request_type' => [
            'class' => 'backend\modules\request_type\Request_type',
        ],
        'request_add_form' => [
            'class' => 'backend\modules\request_add_form\Request_add_form',
        ],
        'complaint' => [
            'class' => 'backend\modules\complaint\Complaint',
        ],
        'adsmanager' => [
            'class' => 'backend\modules\adsmanager\Adsmanager',
        ],
        'offers' => [
            'class' => 'backend\modules\offers\Offers',
        ],
        'static_pages' => [
            'class' => 'backend\modules\static_pages\Static_pages',
        ],
        'reviews' => [
            'class' => 'backend\modules\reviews\Reviews',
        ],
        'seo' => [
            'class' => 'backend\modules\seo\Seo',
        ],
        'reclame_zone' => [
            'class' => 'backend\modules\reclame_zone\Reclame_zone',
        ],
        'reclame_type' => [
            'class' => 'backend\modules\reclame_type\Reclame_type',
        ],
        'reclame_template' => [
            'class' => 'backend\modules\reclame_template\Reclame_template',
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
                'request_type' => '/request_type/request_type',
                'request_add_form' => '/request_add_form/request_add_form',
                'complaint' => 'complaint/complaint/index',
                'adsmanager' => 'adsmanager/adsmanager/index',
                'offers' => 'offers/offers/index',
                'static_pages' => 'static_pages/static_pages/index',
                'reviews' => 'reviews/default',
                'reclame_zone' => 'reclame_zone/reclame_zone',
                'reclame_type' => 'reclame_type/reclame_type',
                'reclame_template' => 'reclame_template/reclame_template',
            ],
        ],
        'urlManagerFrontend' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => '',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
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
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
        ],
    ],
    'params' => $params,
];
