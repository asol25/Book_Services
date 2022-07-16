<?php 
namespace app\core;
require_once 'Router.php';
require_once 'Request.php';
use app\core\Router;

class Application
{
    public Router $router;
    public Request $request;

    public function __construct()
    {
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run()
    {
        $this->router->resolve();
    }
}