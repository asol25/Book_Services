<?php
namespace app\core;

class Request
{
    public function getPath()
    {
        $root = '/';
        $path = $_SERVER['REQUEST_URI'] ?? $root;
        $action = '?'; 
        $position = strpos($path, $action) ?? false;
        if ($position === false) {
            return $path;
        }
    
        return substr($path, 0, $position);
    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}