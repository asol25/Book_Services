<?php
namespace app\core;

class Request
{
    /** Getter method Path of the request.
     * @return mixed $path URL.
     */
    public function getPath(): mixed
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

    /** Getter Method URL of the request.
     * @return string Method of the request method.
     */
    public function getMethod(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}