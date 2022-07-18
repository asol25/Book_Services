<?php

namespace app\core;
class Router
{
    public Request $request;
    protected $routes = [];

    public function __construct($request)
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
        $this->renderMain();
        $this->renderLayoutContent($views);
        // return str_repeat("{{content}}");
    }
    
    protected function renderMain()
    {   
        // ob_start();
        $views = "index";
        include_once __DIR__. "/../views/main/$views.php";
        // return ob_get_clean();
    }
    protected function renderLayoutContent($views)
    {
        // ob_start();
        include_once __DIR__. "/../views/$views.php";
        // return ob_get_clean();
    }

}