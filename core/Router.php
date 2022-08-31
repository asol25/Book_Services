<?php

namespace app\core;
class Router
{
    protected $routes = [];
    protected $request = null;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get($path, $callback)
    {
        return $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        return $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $errorCode = 404;
        $createCode = 200;
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if (!$callback) {
            $pathError = "/demo/views/404.php";
            Application::$app->response->setStatusCode($errorCode);
            include_once Application::$ROOT_PATH . $pathError;
            exit;
        }

        print_r($callback);
        if (is_array($callback)) {
            $callback[0] = new $callback[0]();
        }

        return call_user_func($callback);
    }

    public function renderViews($views, $params)
    {
        $layoutContent = $this->renderMainLayout();
        $viewContent = $this->renderLayoutContent($views, $params);

        return print_r(str_replace("{{content}}", $viewContent, $layoutContent));
    }

    public function renderMainLayout()
    {
        ob_start();
        include_once Application::$ROOT_PATH . "/demo/views/main/index.php";
        return ob_get_clean();
    }

    public function renderLayoutContent($views, $params)
    {
        ob_start();
        include_once Application::$ROOT_PATH . "/demo/views/$views.php";
        return ob_get_clean();
    }
}
