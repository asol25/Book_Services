<?php


namespace app\src\controllers;


use app\core\Controller;

class CallbackController extends Controller
{

    public function CallbackController()
    {
        $auth = $_SESSION['auth'];
        $auth->callback();
        unset($_SESSION['auth']);
    }
}