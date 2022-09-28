<?php


namespace app\src\controllers;

use app\core\Application;
use app\core\Controller;

class SalesController extends Controller
{

    public function SalesController()
    {
        # code...

        $dao = Application::$product;
        $products = $dao->getAllOrderBy("ORDER BY `books`.`discount` DESC LIMIT 5");
        $views = "Sale";
        $options = [
            "Increment" => "ORDER BY `books`.`price` DESC",
            "Decrement" => "ORDER BY `books`.`price` ASC"
        ];

        if (in_array($_GET['option'], array_keys($options))) {
            $query = $options[$_GET['option']];
            $products = $dao->getAllOrderBy($query);
        }

        $dao = Application::$category;
        $category = $dao->getAll();
        $this->render($views, ['products' =>  $products, 'category' => $category]);
    }
}
