<?php

$params = array_merge(require __DIR__ . '/../../common/config/params.php', require __DIR__ . '/../../common/config/params-local.php', require __DIR__ . '/params.php', require __DIR__ . '/params-local.php');

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'uz',
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'class' => 'codemix\localeurls\UrlManager',
            // 'enableLanguageDetection' => false,
            // 'geoIpLanguageCountries' => [
            //     'uz' => ['UZB', 'UZ'],
            //     'ru' => ['RUS', 'RU', 'AZE', 'AZ'],
            //     'en' => ['EN', 'ENG', 'US']
            // ],
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'languages' => ['uz', 'ru', 'en', 'fr', 'de', 'es-*'],
            'rules' => [
                'person/update/<id:\d+>' => 'person/update',
            ],
        ],

        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@frontend/messages',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],

        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js' => [],
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js' => [],
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
            ],
        ],
    ],
    'modules' => [
        'billing' => [
            'class' => 'frontend\modules\billing\Billing',
        ],
    ],
    'params' => $params,

    'on beforeRequest' => function($event) {
        $session = Yii::$app->session;
        if ($session->has('lang')) {
            Yii::$app->language = $session['lang'];
        }
    },
];
