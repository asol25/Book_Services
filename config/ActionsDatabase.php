<?php


namespace app\config;


interface ActionsDatabase
{
    /*
	 * Do not modify the code in this file! 
	 * You are responsible for all the compilation errors that originated from the changes 
	 * made in any of these files including the addition or removal of libraries.
	 * 
	 */
    
    public function get();
    public function create();
    public function update();
    public function remove();

}