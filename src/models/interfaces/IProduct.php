<?php


namespace app\src\models\interfaces;


interface IProduct
{
    /*
     * Do not modify the code in this file!
     * You are responsible for all the compilation errors that originated from the changes
     * made in any of these files including the addition or removal of libraries.
     *
     */
    public function getProductsPopulate();
    public function getProducts();
    public function getProductsToCategory(array $options);
}
