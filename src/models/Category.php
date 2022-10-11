<?php


namespace app\src\models;


use app\core\Application;
use app\src\models\interfaces\ICategory;
use PDO;

class Category implements ICategory
{
    public function getAll(): bool|\PDOStatement
    {
        // TODO: Implement getAll() method.

        $strSQL = "SELECT * FROM `genres` ORDER BY `genres`.`genres_ID` ASC";
        return Application::$database->getMySQL()->getIsConnection()->query($strSQL);
    }

    public function getID($id)
    {
        // TODO: Implement getID() method.
        $strSQL = "SELECT book_genres.book_ID, book_genres.genres_ID, book_genres.book_genres, genres.name FROM `book_genres`
        INNER JOIN genres ON book_genres.genres_ID = genres.genres_ID
        WHERE book_genres.book_ID = {$id};";
        return Application::$database->getMySQL()->getIsConnection()->query($strSQL);
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function addCategory($book_id, $category_id)
    {
        # code...
        $strSQL = "INSERT INTO `book_genres`(`book_ID`, `genres_ID`) VALUES ('$book_id','$category_id')";
        return Application::$database->getMySQL()->getIsConnection()->query($strSQL);
    }

    public function update($object, $id)
    {
        // TODO: Implement update() method.
        $strSQL = "UPDATE `book_genres` SET genres_ID = {$id} WHERE book_genres.book_ID = {$object};";
        return Application::$database->getMySQL()->getIsConnection()->query($strSQL);
    }

    public function remove($object, $id)
    {
        // TODO: Implement remove() method.
    }
}
