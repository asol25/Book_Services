<?php
namespace app\index;

session_start();
require_once 'vendor/autoload.php';
require_once 'core/application.php';
use app\config\Database;
use app\core\Application;
use app\src\controllers\HomeController;
use app\src\controllers\LoginController;
use app\src\controllers\MessageController;
use app\src\services\auth\AuthService;
$app = new Application(dirname(__DIR__));
$database = new Database();
$auth = new AuthService();

$_SESSION['auth'] = $auth;

$app->router->get('/', (array)[HomeController::class, 'HomeController']);
$app->router->post('/login', (array)[LoginController::class, 'LoginController']);
$app->router->post('/logout', (array)[LoginController::class, '']);

$app->router->get('/messages', (array)[MessageController::class, 'MessageController']);
$app->router->post('/messages', (array)[MessageController::class, 'MessageController']);

$app->run();
?>