<?php 
namespace app\src\controllers;
use app\core\Controller;

class MessageController extends Controller {

    public function MessageController() 
    {
        $views = "messages";
        $params = null;
        $this->render($views, $params);
    }
}
