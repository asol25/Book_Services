<?php


namespace app\src\controllers;


use app\core\Application;
use app\core\Controller;

class PopulatesController extends Controller
{
    /**
     * Getter method for the PopulatesController.   
     */
    public function PopulatesController()
    {
        $products = Application::$product;
        $views = "Populate";
        $products = $products->getAllOrderBy("ORDER BY `books`.`populate` DESC");
        $this->render($views, ["products" => $products]);
    }
}