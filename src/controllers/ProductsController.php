<?php


namespace app\src\controllers;

use app\core\Application;
use app\core\Controller;

class ProductsController extends Controller
{
    /**
     * A method Getter ID of the ProductsController.
     */
    public function GetBookController()
    {
        $product = Application::$product;
        if(isset($_GET['book'])) {
            $ID = $_GET['book'];
            $product = $product->getID($ID);
        }
        $views = "BookDetail";
        $this->render($views, $product);
    }
}