<?php


namespace app\src\controllers;


use app\config\OrderSQL;
use app\core\Application;
use app\core\Controller;

class CallbackController extends Controller
{

    public function CallbackController()
    {
        $auth = Application::$auth;
        $auth->callback();
    }
}