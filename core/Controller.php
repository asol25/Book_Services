<?php

namespace app\core;
require_once 'Application.php';
use app\core\Application;

class Controller
{
    protected function render($views, $params)
    {
            return Application::$app->router->renderViews($views, $params);
    }
}