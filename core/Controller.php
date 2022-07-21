<?php

namespace app\core;
require_once 'Application.php';
use app\core\Application;
class Controller
{
    private $cache = null;
    protected function render($views, $params)
    {
        if ($this->cache) {
            return Application::$app->router->renderLayoutContent($views, $params);
        } else {
            $this->cache = Application::$app->router->renderViews($views, $params); 
            echo $this->cache;
        }
    }
}