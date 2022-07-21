<?php
namespace app\core;
require_once './src/controllers/SiteController.php';
use app\src\controllers\SiteController;
class Router
{
    protected $routes = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
    public function get($path, $callback)
    {
        return $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
       
        if ($callback === false) {
            Application::$app->response->setStatusCode(404);
            include_once Application::$ROOT_PATH. "/demo/views/404.php";
            exit;
        } 

        if (is_array($callback)) {
            $callback[0] = new $callback[0]();
        }
        
        return call_user_func($callback);
    }

    public function renderViews($views, $params)
    {
        $layoutContent = $this->renderMainLayout();
        $viewContent = $this->renderLayoutContent($views, $params);

        return str_replace("{{content}}", $viewContent, $layoutContent);
    }
    
    public function renderMainLayout()
    {   
        ob_start();
        include_once Application::$ROOT_PATH. "/demo/views/main/index.php";
        return ob_get_clean();
    }

    public function renderLayoutContent($views, $params)
    {   
        ob_start();
        include_once Application::$ROOT_PATH. "/demo/views/$views.php";
        return ob_get_clean();
    }
}