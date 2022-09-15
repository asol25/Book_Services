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
     * @var String database name of the database.
     */
    protected String $cleardb_db;

    /**
     * A constructor of the database.
     */
    public function __construct($servername, $username, $password, $cleardb_db)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->cleardb_db = $cleardb_db;
        $conn = new MySQL(
            "mysql:host=$servername;dbname=$cleardb_db",
            $username,
            $password
        );
        try {
            //code...
            echo "Connection established database.";
        } catch (\Throwable $th) {
            echo $th;
            //throw $th;
        }
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
