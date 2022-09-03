<?php


namespace app\config;


use PDO;

class PostgreSQL extends Database implements ActionsDatabase
{
    //DO_NOT_EDIT_BELOW_THIS_LINE

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
    }

    protected function connection() : void
    {
        // TODO: Implement connection() method.
        try {
            $pdo = new PDO($this->servername,
                $this->username,
                $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected to the PostgreSQL database successfully!";
        } catch (\PDOException $exception) {
            echo "<pre>";
            print_r($exception);
            echo "</pre>";
        }
    }

    public function get()
    {
        // TODO: Implement get() method.
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function remove()
    {
        // TODO: Implement remove() method.
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        $this->connection();
    }
}