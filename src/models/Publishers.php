<?php


namespace app\src\models;

use app\core\Application;
use app\src\models\interfaces\IPublishers;

class Publishers implements IPublishers
{
    public function getPublishers()
    {
        // TODO: Implement getPublishers() method.
        $strSQL = "SELECT * FROM publishers";
        return Application::$database->getMySQL()->getIsConnection()->query($strSQL);
    }

    public function updatePublisher($name, $publisher_id)
    {
        // TODO: Implement updatePublisher() method.
        $strSQL = "UPDATE `publishers` SET `name`='$name' WHERE `publishers`.`publisher_id` = '$publisher_id'";
        return Application::$database->getMySQL()->getIsConnection()->query($strSQL);
    }

    public function deletePublisher($publisher_id)
    {
        // TODO: Implement deletePublisher() method.
        $strSQL = "DELETE FROM publishers WHERE `publishers`.`publisher_id` = '$publisher_id'";
        Application::$database->getMySQL()->getIsConnection()->query($strSQL);
        $setID = "ALTER TABLE publishers AUTO_INCREMENT = 1;";
        return Application::$database->getMySQL()->getIsConnection()->query($setID);
    }

    
    public function addPublisher($title)
    {
        $strSQL = "INSERT INTO `publishers`(`name`) VALUES ('$title')";
        return Application::$database->getMySQL()->getIsConnection()->query($strSQL);
    }
}
