<?php


namespace app\src\controllers;


use app\core\Controller;

class ShoppingController extends Controller
{

    public function ShoppingController()
    {
        $views = "ShoppingCart";
        $this->render($views, null);    
    }

    public function AddShoppingCart()
    {
        print_r($_GET);
        if (!isset($_SESSION['ShoppingCart']))
            $this->CreateStorageCart();

        $isChecked = false;
        foreach ($_SESSION['ShoppingCart'] as $key => $value) {
            $isChecked = $this->CheckItemInfoStorage($_GET['book_id'], $_SESSION['ShoppingCart'], $key);
        }
        if ($isChecked === false) {
            array_push($_SESSION['ShoppingCart'], [
                'key_id' => $_GET['book_id'],
                'key_name' => $_GET['title'],
                'key_picture' => $_GET['picture'],
                'key_price' => $_GET['price'],
                'key_discount' => $_GET['discount'],
            ]);
        }
        header("Location: /Detail_product?book_isb={$_GET['book_id']}");
    }

    private function CreateStorageCart()
    {
        $_SESSION['ShoppingCart'] = array();
    }

    private function CheckItemInfoStorage(mixed $key_id, mixed $Cart, int|string $key): bool
    {
        return in_array($key_id, array_values($Cart[$key]));
    }
}
