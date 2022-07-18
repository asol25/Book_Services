<?php

namespace app\src;

class Model
{
    public function connection_database()
    { 
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
            echo "Captured Throwable for connection : " . $e->getMessage() . PHP_EOL;
        }
    }
}