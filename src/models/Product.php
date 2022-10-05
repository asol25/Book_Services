<?php


namespace app\src\models;

use app\core\Application;
use app\src\models\interfaces\IProduct;
use PDO;

class Product implements IProduct
{
    public function getProductsPopulate(): bool|\PDOStatement
    {
        // TODO: Implement getProductsPopulate() method.
        $strSQL =  "SELECT books.book_id, books.title, books.subtitle, books.picture\n"
            . "FROM `books`  \n"
            . "ORDER BY `books`.`populate` DESC;";

        return Application::$database->getMySQL()->getIsConnection()->query($strSQL);
    }

    public function getProducts(): bool|\PDOStatement
    {
        // TODO: Implement getProducts() method.
        $strSQL = "SELECT books.book_id, books.picture FROM books\n";
        return Application::$database->getMySQL()->getIsConnection()->query($strSQL);
    }


    public function getProductsToCategory(array $options): bool|\PDOStatement
    {
        // TODO: Implement getProductsPopulate() method.
        $strSQL = 'SELECT books.book_id, books.picture FROM books'

            . '	WHERE EXISTS (SELECT book_genres.book_ID FROM book_genres'

            . ' WHERE book_genres.genres_ID = ' . $options['keyword'] . ')  ';

        if (isset($options['query'])) {
            # code...
            $strSQL .= $options['query'];
        }
        return Application::$database->getMySQL()->getIsConnection()->query($strSQL);
    }

    public function getProduct($isb): bool|\PDOStatement
    {
        // TODO: Implement getProduct() method.
        $strSQL =  "SELECT books.book_id, books.title, books.subtitle, books.price, books.picture 
                    FROM `books` 
                    WHERE books.book_id = $isb;";
        return Application::$database->getMySQL()->getIsConnection()->query($strSQL);
    }

}
