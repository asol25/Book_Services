<?php

namespace app\core;
class Router
{
    public Request $request;
    protected $routes = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
       
        if ($callback === false) {
            Application::$app->response->setStatusCode(404);
            include_once __DIR__. '/../views/404.php';
            exit;
        } 

        if (is_string($callback)) {
            return $this->renderViews($callback);
        }

        return call_user_func($callback);
    }

    protected function renderViews($views)
    {
        $layoutContent = $this->renderMain();
        $viewContent = $this->renderLayoutContent($views);
     
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }
    
    protected function renderMain()
    {   
        // ob_start();
        include_once Application::$ROOT_PATH. "/demo/views/main/index.php";
        // return ob_get_clean();
    }
    protected function renderLayoutContent($views)
    {
        // print_r(Application::$ROOT_PATH. "/demo/views/404.php");
        // ob_start();
        include_once Application::$ROOT_PATH. "/demo/views/$views.php";
        // return ob_get_clean();
    }

}