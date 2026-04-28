<?php

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php', 
    require __DIR__ . '/../../common/config/params-local.php', 
    require __DIR__ . '/params.php', 
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
            'enableCookieValidation' => false,
            'enableCsrfValidation' => false,
        ],
        'response' => [
            'format' => yii\web\Response::FORMAT_JSON,
            'charset' => 'UTF-8',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,  // API uchun false
            'enableSession' => false,    // API uchun session kerak emas
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            // API uchun errorHandler'ni o'chiramiz yoki JSON qaytaradigan qilamiz
            'class' => 'yii\web\ErrorHandler',
            // 'errorAction' => null,  // API uchun action kerak emas
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => [
                        'user',
                        'category',
                        'product',
                    ],
                    'pluralize' => true,  // /users yoki /user ishlaydi
                    'extraPatterns' => [
                        'GET search' => 'search',
                    ],
                ],
                // Default route (ixtiyoriy)
                // '' => 'site/index',
            ],
        ],
    ],
    'params' => $params,
];