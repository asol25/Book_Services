<?php
session_start();
require_once 'vendor/autoload.php';
require_once 'core/Application.php';
use app\core\Application;
use app\src\controllers\AdminController;
use app\src\controllers\CallbackController;
use app\src\controllers\CategoryController;
use app\src\controllers\DetailProductController;
use app\src\controllers\HomeController;
use app\src\controllers\LoginController;
use app\src\controllers\LogoutController;
use app\src\controllers\PaymentController;
use app\src\controllers\ProfileController;
use app\src\controllers\RolesController;
use app\src\controllers\SearchController;
use app\src\controllers\ShoppingController;

$app = new Application(dirname(__DIR__));

$app->router->get('/', (array)[HomeController::class, 'HomeController']);
$app->router->get('/login', (array)[LoginController::class, 'LoginController']);
$app->router->get('/logout', (array)[LogoutController::class, 'LogoutController']);
$app->router->get('/profile', (array)[ProfileController::class, 'ProfileController']);
$app->router->get('/callback', (array)[CallbackController::class, 'CallbackController']);

$app->router->get('/Category', (array)[CategoryController::class, 'CategoryController']);
$app->router->get('/Detail_product', (array)[DetailProductController::class, 'DetailProductController']);
$app->router->get('/AddShoppingCart', (array)[ShoppingController::class, 'AddShoppingCart']);
$app->router->get('/ShoppingCart', (array)[ShoppingController::class, 'ShoppingController']);
$app->router->get('/Role', (array)[RolesController::class, 'GetRoleController']);
$app->router->get('/Search', (array)[SearchController::class, 'SearchController']);
$app->router->get('/Admin', (array)[AdminController::class, 'AdminController']);
$app->router->post('/UpdateProduct', (array)[AdminController::class, 'UpdateProductController']);
$app->router->post('/UpdateAuthor', (array)[AdminController::class, 'UpdateAuthorController']);
$app->router->post('/UpdatePublisher', (array)[AdminController::class, 'UpdatePublisherController']);
$app->router->get('/DeleteProduct', (array)[AdminController::class, 'DeleteProduct']);
$app->router->get('/DeleteAuthor', (array)[AdminController::class, 'DeleteAuthor']);
$app->router->get('/DeletePublisher', (array)[AdminController::class, 'DeletePublisher']);
$app->router->post('/AddProduct', (array)[AdminController::class, 'AddProductController']);
$app->router->post('/AddAuthor', (array)[AdminController::class, 'AddAuthorController']);
$app->router->post('/AddAuthor', (array)[AdminController::class, 'AddAuthorController']);

$app->router->get('/Checkout', (array)[PaymentController::class, 'GetCheckOutPageController']);
$app->router->post('/payment', (array)[PaymentController::class, 'PaymentController']);
$app->router->get('/payment/callback', (array)[PaymentController::class, 'PaymentPageController']);

$app->run();
