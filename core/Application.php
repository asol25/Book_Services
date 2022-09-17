<?php 
namespace app\core;
require_once 'Router.php';
require_once 'Request.php';
require_once 'Response.php';

use app\config\Database;
use app\core\Router;
use app\core\Request;
use app\core\Response;
use app\src\models\Product;
use app\src\services\auth\AuthService;
use app\src\services\CallAPI;
use Auth0\SDK\Auth0;

class Application
{
    public static string $ROOT_PATH;
    public static Application $app;
    public Router $router;
    public Request $request;
    public Response $response;
    public static Database $database;
    public static AuthService $auth;
    public static Product $product;

    public function __construct($rootPath)
    {
        self::$app = $this;
        self::$ROOT_PATH = $rootPath;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request);
        self::$database = new Database("us-cdbr-east-06.cleardb.net", "b7bc8aa38cd488", "f7d98722", "heroku_90c2530383bb326");
        self::$auth = new AuthService();
        self::$product = new Product();
    }

    /**
     * A method resolve Routes of the application.
     */
    public function run()
    {
        $this->router->resolve();
    }
}