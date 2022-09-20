<?php


namespace app\src\controllers;


use app\core\Application;
use app\core\Controller;

class RanksController extends Controller
{
    public function RanksController()
    {
        $products = Application::$product;
        $products = $products->getAllRank();
        $views = "FeedBack";
        $this->render($views, ['products' => $products]);
    }
}