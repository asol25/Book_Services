<?php


namespace app\src\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

class CategoryController extends Controller
{
    public function CategoryController()
    {


        // $REQUEST = new Request();
        // $REQUEST->cleanURL(['order', 'reviews']);

        // print_r($_GET);
        $query_products =  null;

        if (isset($_GET['keyword'])) {
            $query_products = "WHERE book_genres.genres_ID = {$_GET['keyword']} ";
        }

        if (isset($_GET['keyword']) && isset($_GET['order'])) {
            if ($_GET['sortby'] == "review.book_id") {
                $query_products .= "GROUP BY review.book_id, books.book_id ORDER BY (COUNT({$_GET['sortby']})) {$_GET['order']}";
            } else {
                $query_products .= "GROUP BY review.book_id, books.book_id ORDER BY ({$_GET['sortby']}) {$_GET['order']}";
            }
        }

        $views = "Category";
        $dao = Application::$category;
        $category = $dao->getAll();

        $dao = Application::$product;
        $products = $dao->getAllProductToCategory($query_products);
        $this->render($views, ['products' => $products, 'category' => $category]);
    }
}
