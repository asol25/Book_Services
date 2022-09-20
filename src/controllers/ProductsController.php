<?php


namespace app\src\controllers;

use app\core\Application;
use app\core\Controller;
use app\src\models\Cart;

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

    /**
     * A method Getter of the ProductsController.
     */
    public function GetShoppingController()
    {
        $products = $_SESSION['Shopping'];
        $views = "ShoppingCart";
        echo "<pre>";
        print_r($products);
        echo "</pre>";
        $this->render($views, $products);
    }

    public function AddCartShoppingController()
    {
        $shoppingCart = new Cart();
        $shoppingCart->AddShoppingCart($_GET['book_id'], $_GET['selected']);
    }
}