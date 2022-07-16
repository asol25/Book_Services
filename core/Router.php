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

        echo "<pre>";
        print_r($this->routes);
        echo "</pre>";
        if ($callback === false) {
            echo include_once __DIR__. '/../views/404.php';
            exit;
        } 

        if (is_string($callback)) {
            $this->renderView($callback);
        }

        return call_user_func($callback);
    }

    public function renderView($views)
    {
        echo include_once __DIR__. "/../views/$views.php";
    }
}