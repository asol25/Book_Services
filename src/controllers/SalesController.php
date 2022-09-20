<?php


namespace app\src\controllers;

use app\core\Application;
use app\core\Controller;

class SalesController extends Controller
{

    public function SalesController()
    {
        # code...
        $products = Application::$product;
        $products = $products->getAllOrderBy("ORDER BY `books`.`discount` DESC");
        $views = "Sale";
        $this->render($views, ['products' =>  $products]);
    }
}