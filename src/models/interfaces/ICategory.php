<?php


namespace app\src\models\interfaces;


interface ICategory
{
    public function getAll();
    public function getID($id);
    public function create();
    public function update($object, $id);
    public function remove($object, $id);

}