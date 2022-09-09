<?php


namespace app\config;

use app\core\Application;
use app\core\Request;
use Buzz\Exception\CallbackException;

/**
 * Class Database
 * @package app\config
 */
class Database
{

    /**
     * @var String servername of the database.
     */
    protected String $servername;
    /**
     * @var String username of the database.
     */
    protected String $username;
    /**
     * @var String password of the database.
     */
    protected String $password;

    /**
     * A constructor of the database.
     */
    public function __construct()
    {
        $mySQL = new MySQL("mysql:host=localhost;dbname=shop", "root","");
//        $postgreSQL = new PostgreSQL("pgsql:host=localhost;port=5432;dbname=OD_BOOKS_STORE ", "user=postgres ","password=123");
    }

    /**
     * Setter method for the database.
     * @param String $servername of the database.
     */
    public function setServername(string $servername): void
    {
        $this->servername = $servername;
    }

    /**
     * @return String
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Setter method for the database.
     * @param String $username of the database.
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return String
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Setter method for the database.
     * @param String $password of the database.
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
}