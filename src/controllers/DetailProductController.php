<?php


namespace app\src\controllers;


use app\core\Controller;

class DetailProductController extends Controller
{
    public function  DetailProductController()
    {
        $views = "Detail_product";
        $this->render($views, null);
;    }
}