<?php

namespace app\core;
require_once 'Application.php';
use app\core\Application;

class Controller
{
    /**
     * A method render of the controller.
     * @param string $views is the path of the views layer.
     * @param string|null $params is Params the list params.
     * @return string the rendered controllers.
     */
    protected function render(string $views, ?string $params) : string
    {
      return Application::$app->router->renderViews($views, $params);
    }
}