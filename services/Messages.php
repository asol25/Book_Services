<?php

namespace app\services;

class Messages
{   
    public Model $model;
    public function __construct()
    { 
       $this->model = new Model();
    }

    private function connect_Database()
    {

    }
}