<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::create(__DIR__ . '/..');
$dotenv->load();

define('YII_ENV', getenv('APP_ENV') ?: 'prod');
define('YII_DEBUG', getenv('APP_ENV') === 'prod' ?: true);

require_once __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

if (!$config = require(__DIR__ . '/../app/config/web.php')) {
    throw new ErrorException("Application not configured");
}

(new \yii\web\Application($config))->run();
