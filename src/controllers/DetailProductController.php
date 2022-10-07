<?php


namespace app\src\controllers;


use app\core\Controller;

class DetailProductController extends Controller
{
    public function  DetailProductController()
    {
        $views = "DetailPage";
        $this->render($views, null);
;    }
}