<?php
namespace app\index;

session_start();
require_once 'vendor/autoload.php';
require_once 'core/application.php';
use app\core\Application;
use app\src\controllers\CallbackController;
use app\src\controllers\HomeController;
use app\src\controllers\LoginController;
use app\src\controllers\LogoutController;
use app\src\controllers\PaymentController;
use app\src\controllers\ProfileController;
use app\src\controllers\ProductsController;


$app = new Application(dirname(__DIR__));

$app->router->get('/', (array)[HomeController::class, 'HomeController']);
$app->router->get('/login', (array)[LoginController::class, 'LoginController']);
$app->router->post('/login', (array)[LoginController::class, 'LoginController']);
$app->router->get('/logout', (array)[LogoutController::class, 'LogoutController']);
$app->router->get('/profile', (array)[ProfileController::class, 'ProfileController']);
$app->router->get('/callback', (array)[CallbackController::class, 'CallbackController']);

$app->router->get('/GetBook', (array)[ProductsController::class, 'GetBookController']);

$app->router->get('/payment', (array)[PaymentController::class, 'PaymentController']);
$app->router->get('/payment/callback', (array)[PaymentController::class, 'PaymentPageController']);
$app->router->post('/payment/callback', (array)[PaymentController::class, 'PaymentPageController']);

$app->run();
?>