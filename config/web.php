<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
    ],
    'language'=> 'ru-RU',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@adminlte/widgets'   => '@vendor/adminlte/yii2-widgets',
    ],
    'components' => [
//        'LanguageSelector' => [
//            'class' => 'app\components\LanguageSelector',
//        ],
//        'languagepicker' => [
//            'class' => 'lajax\languagepicker\Component',
//            'languages' => ['en' => 'Eng', 'ru' => 'Рус', 'kk'=> 'Қаз']     // List of available languages (icons only)
//        ],
//        'i18n' => [
//            'translations' => [
//                '*' => [
//                    'class' => 'yii\i18n\PhpMessageSource',
//                    //'basePath' => '@app/messages',
//                    //'sourceLanguage' => 'en-US',
////                    'fileMap' => [
////                        'app'       => 'app.php',
////                        'app/error' => 'error.php',
////                    ],
//                ],
//            ],
//        ],
//        "multiLanguage" => [
//            "class" => \skeeks\yii2\multiLanguage\MultiLangComponent::class,
//            'langs' => ['ru-RU', 'en-SU', 'kz-KZ'],
//            'default_lang' => 'en-SU',         //Language to which no language settings are added.
//            'lang_param_name' => 'lang',
//        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'HA3fr9L4W0J1gI3yeCVc4m0fvXwu8QAe',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'mdm\admin\models\User',
            'loginUrl' => ['rbac/user/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
//        'view' => [
//            'theme' => [
//                'pathMap' => [
//                    '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
//                ],
//            ],
//        ],

    ],
    'modules' => [
        'profile' => [
            'class' => 'app\modules\profile\Module',
            'layout' => 'main'
        ],
        'expert' => [
            'class' => 'app\modules\expert\Module',
            'layout' => 'main'
        ],
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'layout' => 'main'
        ],
        'rbac' => [
            'class' => 'mdm\admin\Module',
            'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    /* 'userClassName' => 'app\models\User', */
                    'idField' => 'id',
                    'usernameField' => 'username',
                ],
            ],
            'layout' => 'left-menu',
            'mainLayout' => '@app/views/layouts/main.php',
        ],
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
//            'gii/*',
//            'rbac/*',
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
//        'generators' => [ // here
//            'crud' => [ // generator name
//                'class' => 'yii\gii\generators\crud\Generator', // generator class
//                'templates' => [ // setting for our templates
//                    'yii2-adminlte3' => '@vendor/hail812/yii2-adminlte3/src/gii/generators/crud/default' // template name => path to template
//                ]
//            ]
//        ]
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
