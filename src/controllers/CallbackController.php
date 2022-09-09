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
        unset($_SESSION['auth']);
    }

    public function addController()
    {
        $database = $_SESSION['database'];
        $database->get("add", [OrderSQL::class, "addCart"]);
        $database->execute();
    }
}