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

        try {
            $strSQL = "SELECT * FROM `genres` ORDER BY `genres`.`genres_ID` ASC";
            return Application::$database->getMySQL()->getIsConnection()->query($strSQL);
        } catch (\PDOException $exception) {
            print_r($exception);
        }
    }

    public function getID($id)
    {
        // TODO: Implement getID() method.
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