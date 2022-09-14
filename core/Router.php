<?php

namespace app\core;
class Router
{
    protected array $routes = [];
    protected ?Request $request = null;

    /**
     * Constructor have one parameter.
     * @param Request $request of the request.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Setter method of the Getter Routes.
     * @param string $path is the path of the controller.
     * @param array $callback is the Array container path of the controller and namely of Method.
     * @return array $routes is the Array containers the routes.
     */
    public function get(string $path, array $callback): array
    {
        return $this->routes['get'][$path] = $callback;
    }

      /**
      * Setter method of the POST Router.
      * @param string $path is the path of the controller.
      * @param array $callback is the Array container the path of the controller and namely of Method.
      * @return array $routes is the Array containers the routes.
      */
    public function post(string $path, array $callback): array
    {
        return $this->routes['post'][$path] = $callback;
    }

    /**
     * A method resolve. If the route not matches in Routes then callback to Page 404. TRUE otherwise.
     * @return mixed call_user_func($callback) call be class in the path of the controller.;
     */
    public function resolve(): mixed
    {
        $errorCode = 404;
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if (!$callback) {
            $pathError = "views/404.php";
            Application::$app->response->setStatusCode($errorCode);
            include_once Application::$ROOT_PATH . $pathError;
            exit;
        }

        if (is_array($callback)) {
            $callback[0] = new $callback[0]();
        }

        return call_user_func($callback);
    }

    /**
     * A method render views layout call by the Controller.
     * @param $views string path of the views layer.
     * @param mixed $params the list params.
     * @return bool|string str_replace method to render the layout has been generated.
     */
    public function renderViews(string $views,
                                mixed $params): bool | string
    {
        $layoutContent = $this->renderMainLayout();
        $viewContent = $this->renderLayoutContent($views, $params);

        return print_r(str_replace("{{content}}", $viewContent, $layoutContent));
    }

    /**
     * A method to render the main layout content. There is nothing to do here.
     * @return string ob_get_clean() method to clean ob_start().
     */
    public function renderMainLayout(): string  
    {
        ob_start();
        include_once Application::$ROOT_PATH . "views/main/index.php";
        return ob_get_clean();
    }

     /**
     * A method to render the layout content. There is nothing to do here.
     * @return string ob_get_clean() method to  delete current output buffer of the ob_start() method.
     */
    public function renderLayoutContent($views, mixed $params): string
    {
        ob_start();
        include_once Application::$ROOT_PATH . "views/$views.php";
        return ob_get_clean();
    }
}
