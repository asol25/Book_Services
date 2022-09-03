<?php


namespace app\src\services\auth;


interface AuthServiceInterface
{
    /*
	 * Do not modify the code in this file! 
	 * You are responsible for all the compilation errors that originated from the changes 
	 * made in any of these files including the addition or removal of libraries.
	 * 
	 */
    public function getCredentials();
    public function configuration();
    public function login();
    public function callback();
    public function logout();
}