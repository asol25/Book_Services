<?php


namespace app\config;

use app\core\Application;
use app\core\Request;
use Buzz\Exception\CallbackException;
use PDO;
use PDOException;

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
     * Database constructor.
     * @param $servername           String servername of the database
     * @param $username             String username of the database.
     * @param $password             String password of the database.
     * @param $cleardb_db           String database name of the database.
     */
    public function __construct(string $servername, string $username, string $password, string $cleardb_db)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->cleardb_db = $cleardb_db;

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$cleardb_db", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected to $servername:$cleardb_db\n";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
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
