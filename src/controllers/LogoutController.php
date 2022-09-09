<?php


namespace app\src\controllers;

use app\core\Application;
use app\core\Controller;

class LogoutController extends Controller
{
    /**
     * A method controller of the LogoutController.
     */
    public function LogoutController()
    {
        $auth = Application::$auth;
        $auth->logout();
    }
}