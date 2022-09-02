<?php


namespace app\src\services\auth;


interface AuthServiceInterface
{
//    public function configuration();
    public function getProfile();
    public function login();
    public function callback();
    public function logout();
}