<?php

require_once 'vendor/autoload.php';
require_once 'core/application.php';
use app\core\Application;
$app = new Application();

$app->router->get('/', "home");

$app->router->get('/messages', "messager");

$app->run();