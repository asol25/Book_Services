<?php 
namespace app\src\controllers;
use app\core\Controller;

class HomeController extends Controller
{
    /**
     * A method controller of the HomeController.
     */
    public function HomeController()
    {  
        $views = "home";
        $params = "";
        $this->render($views, $params);
    }

    public function LoginController()
    {
        $username = null;
        $password = null;
        if (isset($_POST)) {
            $username = $_POST['username'];
            $password = $_POST['password'];
        }

        $isCheckedUsername = $username === "admin";
        $isCheckedPassword = $password === "admin";
        if ($isCheckedUsername && $isCheckedPassword) {
            $views = "home";
            $params = "";
            $this->render($views, $params);
        }
    }
}
