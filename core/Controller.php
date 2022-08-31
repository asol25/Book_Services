<?php

namespace app\core;
require_once 'Application.php';
use app\core\Application;

class Controller
{
    /**
     * A method render of the controller.
     * @param string $Views is path of the layer views.
     * @param string $Params is a list of parameters to pass to the controller.
     */
    protected function render($views, $params)
    {
            return Application::$app->router->renderViews($views, $params);
    }
}