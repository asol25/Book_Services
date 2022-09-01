<?php


namespace app\config;

/**
 * Class Database
 * @package app\config
 */
class Database
{
    /**
     * @var String is namely of the server database.
     */
    protected String $servername;
    /**
     * @var String is username of the server database.
     */
    protected String $username;
    /**
     * @var String is password of the server database if have.
     */
    protected String $password;

    /**
     * Database constructor.
     */
    public function __construct()
    {
            $mysql = new MySQL("mysql:host=localhost;dbname=shop", "root","");
    }

    /**
     * @param String $servername
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
     * @param String $username
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
     * @param String $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

}