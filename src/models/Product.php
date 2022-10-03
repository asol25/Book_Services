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

    public function getProductsToCategory(array $options): bool|\PDOStatement
    {
        // TODO: Implement getProductsPopulate() method.
        $strSQL = "SELECT books.book_id, books.picture FROM books\n"

            . "WHERE EXISTS (SELECT book_genres.book_ID FROM book_genres\n"

            . "WHERE book_genres.genres_ID = {$options['category_ID']});";

        return Application::$database->getMySQL()->getIsConnection()->query($strSQL);
    }
}
