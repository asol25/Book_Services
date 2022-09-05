<?php
namespace app\index;

session_start();
require_once 'vendor/autoload.php';
require_once 'core/application.php';
use app\config\Database;
use app\core\Application;
use app\src\controllers\CallbackController;
use app\src\controllers\HomeController;
use app\src\controllers\LoginController;
use app\src\controllers\LogoutController;
use app\src\controllers\MessageController;
use app\src\controllers\PaymentController;
use app\src\controllers\ProfileController;
use app\src\services\auth\AuthService;
use app\src\services\payment\PaymentService;

$app = new Application(dirname(__DIR__));
$database = new Database();
$auth = new AuthService();

$_SESSION['auth'] = $auth;

$app->router->get('/', (array)[HomeController::class, 'HomeController']);
$app->router->get('/login', (array)[LoginController::class, 'LoginController']);
$app->router->post('/login', (array)[LoginController::class, 'LoginController']);
$app->router->get('/logout', (array)[LogoutController::class, 'LogoutController']);
$app->router->get('/profile', (array)[ProfileController::class, 'ProfileController']);
$app->router->get('/callback', (array)[CallbackController::class, 'CallbackController']);

$app->router->get('/payment', (array)[PaymentController::class, 'PaymentController']);
$app->router->get('/payment/callback', (array)[PaymentController::class, 'PaymentPageController']);
$app->router->post('/payment/callback', (array)[PaymentController::class, 'PaymentPageController']);

$app->run();
?>