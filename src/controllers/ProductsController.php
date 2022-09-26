<?php


namespace app\src\controllers;

use app\core\Application;
use app\core\Controller;
use app\src\models\Cart;
use Auth0\SDK\Exception\ArgumentException;

class ProductsController extends Controller
{
    /**
     * A method Getter ID of the ProductsController.
     */
    public function GetBookController()
    {
        $product = Application::$product;
        if (isset($_GET['book'])) {
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
        // echo "<pre>";
        // print_r($products);
        // echo "</pre>";
        $this->render($views, $products);
    }

    /**
     * A method Setter for the ShoppingCart.
     */
    public function AddCartShoppingController()
    {
        $shoppingCart = new Cart();
        $shoppingCart->AddShoppingCart($_GET['book_id'], $_GET['selected']);
    }

    /**
     * A method Getter for the SearchPage.
     */
    public function SearchController()
    {
        try {
            //code...
            if (empty($_POST['search']))
                throw new ArgumentException("Search not value", 1);
                
            $products = Application::$product;
            $products = $products->getSearchName($_POST['search']);
            $views = "SearchPage";
            $this->render($views, ['products' => $products]);
        } catch (ArgumentException $exception) {
            print_r($exception);
            header("Location: /");
        }
    }
}
