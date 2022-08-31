<?php

namespace app\core;
class Router
{
    protected $routes = [];
    protected $request = null;

    /**
     * Constructor have one parameter.
     * @param Request $request of the request.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * A method set Router Getter.
     * @param string $path is the path of controller.
     * @param string $callback is the callback of the controller.
     */
    public function get($path, $callback)
    {
        return $this->routes['get'][$path] = $callback;
    }

     /**
     * A method set Router Post.
     * @param string $path is the path of controller.
     * @param string $callback is the callback of the controller.
     */
    public function post($path, $callback)
    {
        return $this->routes['post'][$path] = $callback;
    }

    /**
     * A method resolve. If the route not matches in Routes then callback to Page 404. TRUE otherwise.
     * @return mixed call_user_func($callback);
     */
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

    /**
     * A method render views layout.
     * @param string $Views is path of the layer views.
     * @param string $Params is a list of parameters to pass from the controller.
     * @return mixed str_replace method to render the layout has been generated.
     */
    public function renderViews($views, $params)
    {
        $layoutContent = $this->renderMainLayout();
        $viewContent = $this->renderLayoutContent($views, $params);

        return print_r(str_replace("{{content}}", $viewContent, $layoutContent));
    }

    /**
     * A method to render the main layout content. There is nothing to do here.
     * @return string ob_get_clean() method to clean ob_start().
     */
    public function renderMainLayout()
    {
        ob_start();
        include_once Application::$ROOT_PATH . "/demo/views/main/index.php";
        return ob_get_clean();
    }

     /**
     * A method to render the layout content. There is nothing to do here.
     * @return string ob_get_clean() method to clean ob_start().
     */
    public function renderLayoutContent($views, $params)
    {
        ob_start();
        include_once Application::$ROOT_PATH . "/demo/views/$views.php";
        return ob_get_clean();
    }
}
