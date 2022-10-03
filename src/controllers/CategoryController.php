<?php


namespace app\src\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use JetBrains\PhpStorm\ArrayShape;

class CategoryController extends Controller
{
    public function CategoryController()
    {
        $dao = Application::$category;
        $category = $dao->getAll();
    }
    #[ArrayShape(["state" => "int", "value" => "bool|\PDOStatement"])] public function GetModuleCategoryController(): array
    {
        $index = 0;
        $message = null;
        try {
            $dao = Application::$category;
            $category = $dao->getAll();

            if ($category) {
                $index = 1;
                $message = $category;
            }
        } catch (\PDO $ex) {
            $message = $ex;
        } finally {
            return Application::$response->setReturnMessage($index, $message);
        }
    }
}
