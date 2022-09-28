<?php 
namespace app\src\controllers;
use app\core\Application;
use app\core\Controller;
use app\src\models\Product;

class HomeController extends Controller
{
    /**
     * A method controller of the HomeController.
     */
    public function HomeController()
    {  
        $views = "Homepage";
        $dao = Application::$product;
        $products = $dao->getAll();
        $topSale = $dao->getAllOrderBy("ORDER BY `books`.`discount` DESC");
        $topReviews = $dao->getAllRank();
        $this->render($views,  ['products' => $products, 'topSale' => $topSale, 'topReviews' => $topReviews]);
    }
}
