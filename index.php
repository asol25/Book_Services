<?php

require_once 'vendor/autoload.php';
require_once 'core/application.php';
require_once 'src/controllers/SiteController.php';
use app\core\Application;
use app\src\controllers\SiteController;
$app = new Application(dirname(__DIR__));

$app->router->get('/', [SiteController::class, 'home']);

$app->router->get('/messages', [SiteController::class, 'messages']);

$app->run();