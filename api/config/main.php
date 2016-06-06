<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
	'modules' => [
        'v1' => [
            'class' => 'app\modules\v1\Module',
        ],
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        'db' => [
                'class' => '\yii\db\Connection',
                'dsn' => 'mysql:host=127.0.0.1;dbname=openyard',
                'username' => "root",
                'password' => "",
                'charset' => 'utf8',
            ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
			'enableStrictParsing' => false,
            'showScriptName' => false,
			'rules' => [
        			[
						'class' => 'yii\rest\UrlRule', 
						'controller' => 'v1/events',
						'tokens' => [
                    		'{id}' => '<id:\\d+>', //commenting out this token allows login to return
                    		'{type}'=>'<type:\\w+>'
                		],	
						'extraPatterns' => ['GET {id}/comments' => 'eventcomments'],					
					],
					[
						'class' => 'yii\rest\UrlRule', 
						'controller' => 'v1/comments',
						'tokens' => [
                    		'{id}' => '<id:\\d+>', //commenting out this token allows login to return
                    		'{type}'=>'<type:\\w+>'
                		],	
						'extraPatterns' => ['GET search/{id}' => 'search', 'GET eventcomments/{id}' => 'eventcomments'],					
					],
					
    		],
        ],
		'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        
    ],
    'params' => $params,
];
