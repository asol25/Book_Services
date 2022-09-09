<?php


namespace app\src\controllers;

use app\core\Application;
use app\core\Controller;

class LoginController extends Controller
{
    /**
     * A method controller of the LoginController.
     */
    public function LoginController()
    {
        $auth = Application::$auth;
        $auth->login();
    }
}