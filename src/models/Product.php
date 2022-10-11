<?php


namespace app\src\models;

use app\core\Application;
use app\src\models\interfaces\IProduct;
use PDO;

class Product implements IProduct
{
    public function getProductsDetail(): bool|\PDOStatement
    {
        // TODO: Implement getProductsDetail() method.
        $strSQL =  "SELECT books.book_id, books.title, books.price, books.picture, books.discount, authors.name as `author`, publishers.name as `publisher` FROM `books`\n"

            . "INNER JOIN authors ON authors.AUTHOR_ID = books.author\n"

            . "INNER JOIN publishers ON publishers.publisher_id = books.publisher;";

        return Application::$database->getMySQL()->getIsConnection()->query($strSQL);
    }

    public function deleteProduct($isb): bool|\PDOStatement
    {
        // TODO: Implement deleteProduct() method.
        $strSQLTable_1 = "DELETE FROM `book_genres` WHERE book_genres.book_ID = {$isb};";
        $strSQLTable_2 = "DELETE FROM `books` WHERE books.book_id = {$isb};";
        Application::$database->getMySQL()->getIsConnection()->query($strSQLTable_1);
        Application::$database->getMySQL()->getIsConnection()->query($strSQLTable_2);
        $setID = "ALTER TABLE books AUTO_INCREMENT = 1";
        return Application::$database->getMySQL()->getIsConnection()->query($setID);
    }

    public function addProduct($options)
    {
        # code...
        $strSQL = "INSERT INTO `books`(`title`,`price`, `picture`, `author`, `publisher`, `discount`, `description`) 
        VALUES ('{$options["title"]}','{$options["price"]}','{$options["picture"]}','{$options["author"]}','{$options["publisher"]}','{$options["discount"]}','{$options["description"]}');";
        Application::$database->getMySQL()->getIsConnection()->query($strSQL);
        $selectID = "SELECT LAST_INSERT_ID();";
        return Application::$database->getMySQL()->getIsConnection()->query($selectID);
         
    }


    public function getProductsPopulate(): bool|\PDOStatement
    {
        // TODO: Implement getProductsPopulate() method.
        $strSQL =  "SELECT books.book_id, books.title, books.subtitle, books.picture, book_genres.genres_ID 
        FROM `books` INNER JOIN book_genres ON book_genres.book_ID = books.book_id 
        ORDER BY `books`.`populate` DESC  LIMIT 4";

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
        $strSQL =  "SELECT books.book_id, books.title, books.subtitle, books.price, books.picture, books.description
                    FROM `books` 
                    WHERE books.book_id = $isb;";
        return Application::$database->getMySQL()->getIsConnection()->query($strSQL);
    }

    public function searchProducts($name)
    {
        // TODO: Implement searchProducts() method.
        $strSQL = "SELECT books.book_id, books.picture ,books.title FROM books\n"

            . "WHERE books.title LIKE \"%$name%\";";
        return Application::$database->getMySQL()->getIsConnection()->query($strSQL);
    }

    public function updateProduct($options)
    {
        // TODO: Implement updateProduct() method.
        $insert = null;
        foreach ($options as $key => $value) {
            if (!empty($value) && $value !== null && $key !== 'category') {
                $insert .= " {$key} = '{$value}', ";
            }
        }
        $insert = substr($insert, 0, -2);

        print_r($insert);
        $strSQL = "UPDATE `books` SET {$insert} WHERE book_id = {$options['book_id']}";
        return Application::$database->getMySQL()->getIsConnection()->query($strSQL);
    }
}
