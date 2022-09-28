<?php
session_start();
require_once 'vendor/autoload.php';
require_once 'core/Application.php';
use app\core\Application;
use app\src\controllers\CallbackController;
use app\src\controllers\CategoryController;
use app\src\controllers\HomeController;
use app\src\controllers\LoginController;
use app\src\controllers\LogoutController;
use app\src\controllers\PaymentController;
use app\src\controllers\PopulatesController;
use app\src\controllers\ProfileController;
use app\src\controllers\ProductsController;
use app\src\controllers\RanksController;
use app\src\controllers\SalesController;


$app = new Application(dirname(__DIR__));

$app->router->get('/', (array)[HomeController::class, 'HomeController']);
$app->router->get('/login', (array)[LoginController::class, 'LoginController']);
$app->router->get('/logout', (array)[LogoutController::class, 'LogoutController']);
$app->router->get('/profile', (array)[ProfileController::class, 'ProfileController']);
$app->router->get('/callback', (array)[CallbackController::class, 'CallbackController']);

$app->router->get('/Category', (array)[CategoryController::class, 'CategoryController']);
$app->router->get('/Populate', (array)[PopulatesController::class, 'PopulatesController']);
$app->router->get('/Ranks', (array)[RanksController::class, 'RanksController']);
$app->router->get('/Sale', (array)[SalesController::class, 'SalesController']);
$app->router->get('/ShoppingCart', (array)[ProductsController::class, 'GetShoppingController']);
$app->router->post('/Search', (array)[ProductsController::class, 'SearchController']);
$app->router->get('/AddShoppingCart', (array)[ProductsController::class, 'AddCartShoppingController']);

$app->router->get('/payment', (array)[PaymentController::class, 'PaymentController']);
$app->router->get('/payment/callback', (array)[PaymentController::class, 'PaymentPageController']);
$app->router->post('/payment/callback', (array)[PaymentController::class, 'PaymentPageController']);

$app->run();
