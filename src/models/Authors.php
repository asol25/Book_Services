<?php


namespace app\src\models;


use app\core\Application;
use app\src\models\interfaces\IAuthors;

class Authors implements IAuthors
{
    public function getAuthors()
    {
        // TODO: Implement getAuthors() method.
        $strSQL = "SELECT * FROM `authors`";
        return Application::$database->getMySQL()->getIsConnection()->query($strSQL);
    }

    public function deleteAuthors($author_id)
    {
        // TODO: Implement deleteAuthors() method.
        $strSQL = "DELETE FROM authors WHERE `authors`.`AUTHOR_ID` = '$author_id'";
        return Application::$database->getMySQL()->getIsConnection()->query($strSQL);
    }

    public function updateAuthor($name, $author_id)
    {
        // TODO: Implement updateAuthor() method.
        $strSQL = "UPDATE `authors` SET `name`='$name' WHERE `authors`.`AUTHOR_ID` = '$author_id'";
        return Application::$database->getMySQL()->getIsConnection()->query($strSQL);
    }

    public function addAuthor($title)
    {
        $strSQL = "INSERT INTO `authors`(`name`) VALUES ('$title')";
        return Application::$database->getMySQL()->getIsConnection()->query($strSQL);
    }
}
