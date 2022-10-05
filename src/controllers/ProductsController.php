<?php


namespace app\src\controllers;

use app\core\Application;
use app\core\Controller;
use app\src\models\Cart;
use app\src\models\Product;
use Auth0\SDK\Exception\ArgumentException;
use JetBrains\PhpStorm\ArrayShape;
use Psr\Log\InvalidArgumentException;

class ProductsController extends Controller
{
    public int $code;
    public mixed $message;

    public function __construct()
    {
        $this->code = 0;
        $this->message = null;
    }

    /**
     * Getter method of the Products Controller.
     * @return array Container information for products populated.
     */
    #[ArrayShape(["code" => "int", "message" => "bool|\PDOStatement|string"])] public function GetModuleProductsPopulate(): array
    {
        try {
            $products = Application::$product->getProductsPopulate();

            if ($products->rowCount()) {
                $this->code = 1;
                $this->message = $products;
            }
        } catch (\PDOException $exception) {
            $this->message = $exception->getMessage();
        } finally {
            return Application::$response->setReturnMessage($this->code, $this->message);
        }
    }

    /**
     * Getter method for the Product Controller.
     * @return array Container information for products flowing ID category.
     */
    #[ArrayShape(["code" => "int", "message" => "bool|\PDOStatement|string"])] public function GetModuleProductsFlowCategory(): array
    {
        $products = null;
        try {
            $isCheckedEmpty = empty($_GET['category']) && $_GET['category'] !== 0;
            if ($isCheckedEmpty) {
                $products = Application::$product->getProducts();
            } else {
                $options = [
                    'category_ID' => $_GET['category'],
                ];
                $products = Application::$product->getProductsToCategory($options);
            }

            if ($products->rowCount()) {
                $this->code = 1;
                $this->message = $products->fetchAll();
            };
        } catch (\PDOException $exception) {
            $this->message = $exception->getMessage();  
        } finally {
            return Application::$response->setReturnMessage($this->code, $this->message);
        }
    }
}
