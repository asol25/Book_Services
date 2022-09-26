<?php


namespace app\src\models;

use app\core\Application;
use app\src\models\interfaces\IProduct;
use Auth0\SDK\Exception\ArgumentException;

class Product implements IProduct
{
    /**
     * Getter method for the products.
     * @return bool|\PDOStatement Object container information for the products.
     */
    public function getAllOrderBy(string $query): bool|\PDOStatement
    {
        // TODO: Implement getAllPopulate() method.
        $strSQL = "SELECT books.book_id AS `book_id`, title, subtitle, price, picture, url, authors.name AS `authors_name`, publishers.name AS `publisher_name`, discount 
                            FROM (((books INNER JOIN authors ON books.author = authors.AUTHOR_ID) 
                                INNER JOIN publishers ON books.publisher = publishers.publisher_id) 
                                INNER JOIN book_genres ON book_genres.book_ID = books.book_id) 
                                       $query";
        return Application::$database->getMySQL()->getIsConnection()->query($strSQL);
    }

    /**
     * Getter method for the products.
     * @return bool|\PDOStatement Object container information for the products.
     */
    public function getAllRank(): bool|\PDOStatement
    {
        $strSQL = "SELECT books.book_id AS `book_id`,
                    title, subtitle, price, picture, url,
                    authors.name AS `authors_name`,
                    publishers.name AS `publisher_name`,
                    discount, COUNT(books.review) as `feeback` 
                        FROM (((books INNER JOIN authors ON books.author = authors.AUTHOR_ID) 
                            INNER JOIN publishers ON books.publisher = publishers.publisher_id) 
                            INNER JOIN book_genres ON book_genres.book_ID = books.book_id) 
                            GROUP BY books.review;";
        return Application::$database->getMySQL()->getIsConnection()->query($strSQL);
    }

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

    /**
     * Getter method for the products depend on ID.
     * @return bool|\PDOStatement Object container information for the products.
     */
    public function getID($id): bool|\PDOStatement
    {
        // TODO: Implement getID() method.
        $strSQL = "SELECT * FROM `books` WHERE book_id = $id";
        return Application::$database->getMySQL()->getIsConnection()->query($strSQL);
    }

    /**
     * Getter method for the Category.
     * @return bool|\PDOStatement Object container information for the products.
     */
    public function getAllProductToCategory($category): bool|\PDOStatement
    {
        // TODO: Implement getAllProductToCategory() method.
        try {
            $strSQL = 'SELECT books.book_id AS "book_id", title, subtitle, price, picture, url, authors.name AS "authors_name", publishers.name AS "publisher_name", discount 
                            FROM (((books INNER JOIN authors ON books.author = authors.AUTHOR_ID) 
                                INNER JOIN publishers ON books.publisher = publishers.publisher_id) 
                                INNER JOIN book_genres ON book_genres.book_ID = books.book_id) 
                                    WHERE book_genres.genres_ID = ' . $category . ';';

            return Application::$database->getMySQL()->getIsConnection()->query($strSQL);
        } catch (ArgumentException $exception) {
            print_r($exception);
        }
    }

    /**
     * Getter method for the Search depend on Name product.
     * @return bool|\PDOStatement Object container information for the products.
     */
    public function getSearchName($query): bool|\PDOStatement
    {
        try {
            $strSQL = 'SELECT books.book_id AS "book_id", title, subtitle, price, picture, url, authors.name AS "authors_name", publishers.name AS "publisher_name", discount 
                            FROM (((books INNER JOIN authors ON books.author = authors.AUTHOR_ID) 
                                INNER JOIN publishers ON books.publisher = publishers.publisher_id) 
                                INNER JOIN book_genres ON book_genres.book_ID = books.book_id) 
                                    WHERE books.title LIKE "%' . $query . '%"';

            return Application::$database->getMySQL()->getIsConnection()->query($strSQL);
        } catch (ArgumentException $exception) {
            print_r($exception);
        }
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
