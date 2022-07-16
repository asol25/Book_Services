<?php

require_once '/../vendor/autoload.php';
require_once '/../core/application.php';
use app\core\Application;

$app = new Application();

$app->router->get('/', function() {
    return 'home';
});

$app->router->get('/messages', function() {
    return include_once __DIR__. '/../views/messager.php';
});

$app->run();