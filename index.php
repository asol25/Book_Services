<?php
session_start();
require_once 'vendor/autoload.php';
require_once 'core/application.php';

use app\config\Database;
use app\core\Application;
use app\src\controllers\HomeController;
use app\src\controllers\MessageController;

$app = new Application(dirname(__DIR__));
$database = new Database();

$app->router->get('/', (array)[HomeController::class, 'HomeController']);
$app->router->post('/login', (array)[HomeController::class, 'LoginController']);

$app->router->get('/messages', (array)[MessageController::class, 'MessageController']);
$app->router->post('/messages', (array)[MessageController::class, 'MessageController']);

$app->run();

?>