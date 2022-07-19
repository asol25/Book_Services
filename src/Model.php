<?php

namespace app\src;

class Model
{
    public $dbhost = "localhost:80";
    public $dbuser = "root";
    public $dbpass = "1234";
    public $db = "messager";

    public function connection_database()
    { 
        try {
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
            
            if ($conn) {
                echo 'Connected successfully';
            }
            return $conn;
        } catch (\Exception $e) {
            echo "Captured Throwable for connection : " . $e->getMessage(), "\n";
        }
    }

    public function Close()
    {
        $conn->close();
    }
}