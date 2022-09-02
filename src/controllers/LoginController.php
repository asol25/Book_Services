<?php


namespace app\src\controllers;
use app\core\Controller;

class LoginController extends Controller
{
    /**
     * A method controller of the LoginController.
     */
    public function LoginController()
    {
        $views = "login";
        $params = null;
        $this->render($views, $params);
    }
}