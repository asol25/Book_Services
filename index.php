<?php
session_start();
?>
<?php
require_once 'vendor/autoload.php';
require_once 'core/application.php';
use app\core\Application;
use app\src\controllers\MessageController;
use app\src\controllers\HomeController;
$app = new Application(dirname(__DIR__));

$app->router->get('/', [HomeController::class, 'HomeController']);
$app->router->post('/', [HomeController::class, 'HomeController']);

$app->router->get('/messages', [MessageController::class, 'MessageController']);
$app->router->post('/messages', [MessageController::class, 'MessageController']);

$app->run();