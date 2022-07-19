<?php 
namespace app\core;
require_once 'Router.php';
require_once 'Request.php';
require_once 'Response.php';
require_once './src/Model.php';
use app\core\Router;
use app\core\Request;
use app\core\Response;
use app\src\Model;

class Application
{
    public static string $ROOT_PATH;
    public static Application $app;
    public Router $router;
    public Request $request;
    public Response $response;
    public Model $model;

    public function __construct($rootPath)
    {
        self::$ROOT_PATH = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request);
    }

    public function run()
    {
        return $this->router->resolve();
    }
}