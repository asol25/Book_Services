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
        $sdk = $_SESSION['auth'];
        echo "<pre>";
        var_dump($sdk->getSdk()->login());
        echo "</pre>";
    }
}