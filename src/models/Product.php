<?php


namespace app\src\models;


use app\core\Application;
use app\src\models\interfaces\IProduct;

class Product implements IProduct
{

    public function __construct()
    {
    }

    /**
     * Getter method for the products.
     * @return array|string|object Object container information for the products.
     */
    public function getAll(): array|string|object
    {
        // TODO: Implement getAll() method
        if (empty($_SESSION['products'])) {
            $response = file_get_contents('https://api.itbook.store/1.0/search/mongodb');
            $response = json_decode($response);
            $_SESSION['products'] = $response->{"books"};

            return $_SESSION['products'];
        }

        return  $_SESSION['products'];
    }

    public function getID($id)
    {
        // TODO: Implement getID() method.
        if (empty($_SESSION['products']))
            $this->getAll();


        return  $_SESSION['products'][$id];
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function update($object, $id)
    {
        // TODO: Implement update() method.
    }

    public function remove($object, $id)
    {
        // TODO: Implement remove() method.
    }
}