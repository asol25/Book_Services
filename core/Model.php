<?php

namespace app\core;

class Model {
    
    public function getlogin()
    {
        if(isset($_REQUEST['username'])&& isset($_REQUEST['password'])) {
        if($_REQUEST['username']=='admin' && $_REQUEST['password']=='123'){
            return'login';
        }
        else{
        }
            return'invalid user';
    }
    }
}