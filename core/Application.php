<?php 
namespace app\core;
require_once 'Router.php';
require_once 'Request.php';
require_once 'Response.php';
use app\core\Router;
use app\core\Request;
use app\core\Response;

class Application
{
    public static string $ROOT_PATH;
    public static Application $app;
    public Router $router;
    public Request $request;
    public Response $response;

    public function __construct($rootPath)
    {
        self::$app = $this;
        self::$ROOT_PATH = $rootPath;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request);
    }

    /**
     * A method resolve Routes of the application.
     */
    public function run()
    {
        $this->router->resolve();
    }
}