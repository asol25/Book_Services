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
        $auth = $_SESSION['auth'];
        $auth->login();
    }
}