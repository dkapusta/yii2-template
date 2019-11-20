<?php

return [
    'id' => 'yii2-template-cli',
    'basePath' => dirname(__DIR__),
    'vendorPath' => dirname(__DIR__) . '/../vendor',
    'controllerNamespace' => 'app\commands',

    'components' => [
        'db' => require(__DIR__ . '/com/db.php'),
    ],

    'aliases' => require(__DIR__ . '/com/aliases.php'),
    'params' => require(__DIR__ . '/params.php'),
];
