<?php

namespace app\core;

class Request
{

    public array $rules = [];
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

    public function cleanURL($path)
    {

        foreach ($path as $key => $val) {
            array_push($this->rules, strpos($_SERVER['QUERY_STRING'], $val));
        }
        
      
    
        foreach ($this->rules as $key => $value) {
            if (!empty($value)) {
                $path =  $_SERVER['QUERY_STRING'];
                $_SERVER['QUERY_STRING'] = substr($path, 0, $value - 1);
            }
        }
    }
}
