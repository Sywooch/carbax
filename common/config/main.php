<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'name'=>'Carbax',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'ipgeobase' => [
            'class' => 'himiklab\ipgeobase\IpGeoBase',
            'useLocalDB' => true,
        ],
        'authClientCollection' => [
            'class'   => \yii\authclient\Collection::className(),
            'clients' => [
                // here is the list of clients you want to use
                // you can read more in the "Available clients" section
                'vkontakte' => [
                    'class'        => 'dektrium\user\clients\VKontakte',
                    'clientId'     => '5070404',
                    'clientSecret' => 'G3roNgQHsxBmE7mL2QYB',
                ],
                'facebook' => [
                    'class'        => 'dektrium\user\clients\Facebook',
                    'clientId'     => '959731457456986',
                    'clientSecret' => '9ca593a0fca3880fe6d85d45302bfe94',
                ],
                'twitter' => [
                    'class'          => 'dektrium\user\clients\Twitter',
                    'consumerKey'    => 'qHdLS0iW9lGT23V2oXlnOg1q2',
                    'consumerSecret' => 'iZofOqIDqIGvj7lHpsiWOhN5yVIixW7MruXCpSzsoR0X5pu3by',
                ],
                'google' => [
                    'class'        => 'dektrium\user\clients\Google',
                    'clientId'     => '356181318539-tsrc9cuhfv3ag8snsqbmee7i3immrkce.apps.googleusercontent.com',
                    'clientSecret' => 'KuR3Thc0_aYZ5dOUPTi0chmn',
                ],
            ],
        ],
        'yandexMapsApi' => [
            'class' => 'mirocow\yandexmaps\Api',
        ],
    ],
    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\Controller',
            'access' => ['@', '?'],
            'disabledCommands' => ['netmount'],
            'roots' => [
                [
                    'baseUrl' => '',
                    'basePath' => '@frontend/web',
                    'path' => 'media/upload',
                    'name' => 'Изображения',
                ],
            // [
            // 'class' => 'mihaildev\elfinder\UserPath',
            // 'path' => 'files/user_{id}',
            // 'name' => 'My Documents'
            // ],
            // [
            // 'path' => 'image/some',
            // 'name' => ['category' => 'my', 'message' => 'Some Name'] //перевод Yii::t($category, $message)
            // ],
            // [
            // 'path' => 'image/some',
            // 'name' => ['category' => 'my', 'message' => 'Some Name'], // Yii::t($category, $message)
            // 'access' => ['read' => '*', 'write' => 'UserFilesAccess']
            // // * - для всех, иначе проверка доступа в даааном примере все могут видет а редактировать могут пользователи только с правами UserFilesAccess
            // ]
            ],
            'watermark' => [
                'source' => __DIR__ . '/logo.png', // Path to Water mark image
                'marginRight' => 5, // Margin right pixel
                'marginBottom' => 5, // Margin bottom pixel
                'quality' => 95, // JPEG image save quality
                'transparency' => 70, // Water mark image transparency ( other than PNG )
                'targetType' => IMG_GIF | IMG_JPG | IMG_PNG | IMG_WBMP, // Target image formats ( bit-field )
                'targetMinPixel' => 200 // Target image minimum pixel size
            ]
        ]
    ],
    'bootstrap' => ['debug'],
    'modules' => [
        'debug' => [
            'class' => 'yii\debug\Module',
            'allowedIPs' => ['127.0.0.1']
        ],
        'rbac' => [
            'class' => 'dektrium\rbac\Module',
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'enableGeneratingPassword' => true,
            'enableConfirmation' => true,
            'enableFlashMessages' => false,
            'confirmWithin' => 86400,
            'cost' => 12,
            'admins' => ['admin'],
            'mailer' => [
                'sender'                => 'admin@carbax.ru', // or ['no-reply@myhost.com' => 'Sender name']
                'welcomeSubject'        => 'Добро пожаловать',
                'confirmationSubject'   => 'Confirmation subject',
                'reconfirmationSubject' => 'Email change subject',
                'recoverySubject'       => 'Recovery subject',
            ],
        ],
    ],
];
