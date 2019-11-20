<?php

return [
    'id' => 'yii2-template',
    'basePath' => dirname(__DIR__),
    'vendorPath' => dirname(__DIR__) . '/../vendor',

    'defaultRoute' => 'common/index',

    'aliases' => require(__DIR__ . '/com/aliases.php'),
    'params' => require(__DIR__ . '/params.php'),
];
