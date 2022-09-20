<?php


namespace app\src\models;


use app\core\Application;

class Cart
{
    public array $shoppingCart;

    public function __construct()
    {
    }

    public function  AddShoppingCart(mixed $id, $callback)
    {
        $product = Application::$product;
        $product = $product->getID($id);

        if (!isset($_SESSION['Shopping'])) {
            $_SESSION['Shopping'] = array();
        }

        if (isset($product)) {
            $product = $product->fetch();
            $isChecked = false;

            foreach ($_SESSION['Shopping'] as $key => $value) {
                $isChecked = $this->CheckItemInfoStorage($product['book_id'], $_SESSION['Shopping'], $key);
            }

            if ($isChecked === false) {
                array_push($_SESSION['Shopping'], [
                    'book_id' =>  $product['book_id'],
                    'book_title' => $product['title'],
                    'book_picture' => $product['picture'],
                    'book_price' => $product['price'],
                ]);
            }
            header("Location: /$callback");
        }
    }

    private function CheckItemInfoStorage($id, array $storage, $key): bool
    {
        return in_array($id, array_values($storage[$key]));
    }
}