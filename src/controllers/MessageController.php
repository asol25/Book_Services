<?php

namespace app\src\controllers;

use app\core\Controller;

class MessageController extends Controller
{
    /**
     * A method controller of the MessageController.
     */
    public function MessageController()
    {
        $views = "messages";
        $params = null;
        $this->render($views, $params);
    }
}
