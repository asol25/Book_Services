<?php

namespace app\config;


use PDO;

/**
 * Class MySQL
 * @package app\config
 */
class MySQL extends Database
{
    //DO_NOT_EDIT_BELOW_THIS_LINE

    /**
     * @var PDO Connect PDO for the MY SQL.
     */
    public PDO $isConnection;
    /**
     * A constructor with three parameters.
     * @param string $servername of the the database.
     * @param string $username of the the database.
     * @param string $password of the the database.
     */
    public function __construct(string $servername, string $username, string $password)
    {
        $this->setServername($servername);
        $this->setUsername($username);
        $this->setPassword($password);

        $this->isConnection = $this->connection();
    }

    /**
     * Getter method for the MY SQL.
     * @return PDO Connect PDO for the MY SQL.
     */
    public function getIsConnection(): PDO
    {
        return $this->isConnection;
    }


    /**
     * A method connect database of the MySQL.
     */
    public function connection(): PDO
    {
        // TODO: Implement connection() method.
        try {
            $isChecked = empty($this->servername || $this->username || $this->password);

            if ($isChecked)
                throw new \PDOException("Missing type");

            $conn = new PDO(
                $this->servername,
                $this->username,
                $this->password
            );

            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
        }
    }

    /**
     * Setter method of the database.
     * @param string $servername is name server of the mysql to the database.
     */
    public function setServername(string $servername): void
    {
        parent::setServername($servername); // TODO: Change the autogenerated stub
    }

    /**
     * Getter method of the database.
     * @return string $Username is name server of the mysql to the database.
     */
    public function getUsername(): string
    {
        return parent::getUsername(); // TODO: Change the autogenerated stub
    }

    /**
     * Setter method of the database.
     * @param string $username is name server of the mysql to database.
     */
    public function setUsername(string $username): void
    {
        parent::setUsername($username); // TODO: Change the autogenerated stub
    }

    /**
     * Getter method of the database.
     * @return string $password is password server of the mysql to database.
     */
    public function getPassword(): string
    {
        return parent::getPassword(); // TODO: Change the autogenerated stub
    }

    /**
     * Setter method of the database.
     * @param string $password is password server of the mysql to database.
     */
    public function setPassword(string $password): void
    {
        parent::setPassword($password); // TODO: Change the autogenerated stub
    }
}
