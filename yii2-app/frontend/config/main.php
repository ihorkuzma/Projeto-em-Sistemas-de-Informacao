<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'api' => [
            'class' => 'frontend\modules\api\Module',
        ],
    ],
    'components' => [
        'request' => [
            'parsers'=> [
                'application/json' => 'yii\web\JsonParser',
            ],
            //'csrfParam' => '_csrf-frontend',



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
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [

            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/clientes',
                    'pluralize' => false,

                    'extraPatterns' => [
                        'GET total' => 'total',
                        'GET clientes' => 'clientes',
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/alimentos',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET total' => 'total',
                        'POST pedido' => 'pedido',
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/linhavendas',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET getlinhavendas => getlinhavendas',
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/mesas',
                    'pluralize' => false,
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/reservas',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET getreservas => getreservas',
                        'POST reservas' => 'reservas',
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/tipoalimentos',
                    'pluralize' => false,
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/tipovendas',
                    'pluralize' => false,
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/users',
                    'pluralize' => false,
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/vendas',
                    'pluralize' => false,
                ],

                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/login',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'POST login' => 'login',
                    ],
                ],

            ],
        ],



    ],
    'params' => $params,
];
