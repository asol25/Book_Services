<?php 
namespace app\core;
require_once 'Router.php';
require_once 'Request.php';
require_once 'Response.php';

use app\config\Database;
use app\core\Router;
use app\core\Request;
use app\core\Response;
use app\src\models\Category;
use app\src\models\Product;
use app\src\services\auth\AuthService;


class Application
{
    public static string $ROOT_PATH;
    public static Application $app;
    public Router $router;
    public Request $request;
    public static Response $response;
    public static Database $database;
    public static AuthService $auth;
    public static Product $product;
    public static Category $category;

    public function __construct($rootPath)
    {
        self::$app = $this;
        self::$ROOT_PATH = $rootPath;
        $this->request = new Request();
        self::$response = new Response();
        $this->router = new Router($this->request);
        self::$database = new Database("localhost", "root", "", "bookstore");
        self::$auth = new AuthService();
        self::$product = new Product();
        self::$category = new Category();
    }

    /**
     * A method resolve Routes of the application.
     */
    public function run()
    {
        $this->router->resolve();
    }
}