<?php 
namespace app\src\controllers;
use app\core\Controller;

class HomeController extends Controller {

    public function HomeController()
    {  
        $views = "home";
        $params = null;
        $this->render($views, $params);
    }
}
?>