<?php


namespace app\src\models\interfaces;


interface ICategory
{
    
    /*
    * Do not modify the code in this file!
    * You are responsible for all the compilation errors that originated from the changes
    * made in any of these files including the addition or removal of libraries.
    *
    */
    public function getAll();
    public function getID($id);
    public function create();
    public function update($object, $id);
    public function remove($object, $id);

}