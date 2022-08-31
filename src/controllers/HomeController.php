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
        $params = null;
        $this->render($views, $params);
    }
}
