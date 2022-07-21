<?php

namespace app\src\controllers;
require_once './core/Controller.php';
use app\core\Controller;
use app\core\Application;

class SiteController extends Controller
{
    public function home()
    {  
        $views = "home";
        $this->render($views, "123");
    }

    public function messages()
    {  
        $views = "messages";
        $this->render($views, "123");
    }
}