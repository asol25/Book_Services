<?php


namespace app\src\controllers;

use app\core\Application;
use app\core\Controller;
use app\src\models\Cart;

class CategoryController extends Controller
{
    public function CategoryController()
    {
        $selectOption = $_GET['taskOption'];
        $views = "Category";
        $products = Application::$product;
        $category = Application::$category;
        $category = $category->getAll();
        $products = $products->getAllProductToCategory($selectOption);
        $this->render($views, ['products' => $products, 'category' => $category, 'selectOption' => $selectOption]);
    }
}
