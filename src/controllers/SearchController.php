<?php


namespace app\src\controllers;


use app\core\Application;
use DOMDocument;

class SearchController
{
    public function  SearchController()
    {
        $response = null;
        try {
            if (isset($_GET['searchKeyword'])) {
                $daoProducts = Application::$product;
                $response = $daoProducts->searchProducts($_GET['searchKeyword']);
            }
            
            $result = null;
            while ($row = $response->fetch()) {
                # code...
                $requestLink = "Detail_product?book_isb=" . $row['book_id'];
                $result .= '
                <li class="live_search_item"><a href="'.$requestLink.'" class="live_search_link">'.$row['title'].'</a></li>
                ';
            }

            print_r($result);
        } catch (\PDOException $th) {
            echo "Error: " . $th->getMessage();
        };
    }
}
