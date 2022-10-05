<?php


namespace app\src\controllers;

use app\core\Application;
use app\core\Controller;
use JetBrains\PhpStorm\ArrayShape;

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
            $isCheckedEmpty = empty($_GET['keyword']) && $_GET['keyword'] == null;

            if ($isCheckedEmpty) {
                $products = Application::$product->getProducts();
            } else {
                $options = [
                    'keyword' => $_GET['keyword'],
                ];

                if (isset($_GET['order']) && isset($_GET['sortBy'])) {
                    # code...
                    $options = [
                        'keyword' => $_GET['keyword'],
                        'query' => 'ORDER BY (' . $_GET['sortBy'] . ') ' . $_GET['order'] . ''
                    ];
                }
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

    public function GetModuleDetailProduct()
    {
        $product = null;
        try {
            if (isset($_GET['book_isb'])) {
                $product = Application::$product->getProduct($_GET['book_isb']);
            }

            if ($product->rowCount()) {
                $this->code = 1;
                $this->message = $product->fetchAll();
            };
        } catch (\PDOException $exception) {
            $this->message = $exception->getMessage();
        } finally {
            return Application::$response->setReturnMessage($this->code, $this->message);
        }
    }
}
