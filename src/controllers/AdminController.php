<?php


namespace app\src\controllers;

use app\core\Application;
use app\core\Controller;
use app\src\models\Authors;
use app\src\models\Product;
use app\src\models\Publishers;
use app\src\services\auth\AuthRoles;
use app\src\services\auth\AuthService;
use Exception;

class AdminController extends Controller
{

    /**
     * @throws Exception if the user access not admin.
     */
    public function AdminController()
    {

        try {
            $authRole = new AuthRoles();
            $admin = $authRole->GetRole();

            if (!$admin)
                throw new Exception("you don't have enough access rights", 1);

            $views = "AdminPage";
            $this->render($views, null);
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }

    public function DeleteProduct()
    {

        if (isset($_GET['book_id'])) {
            # code...
            $daoProduct = Application::$product;
            $daoProduct->deleteProduct($_GET['book_id']);
        }

        header("location: /Admin?select=Manager&options=Products");
    }

    public function UpdateProductController()
    {
        # code...
        print_r($_POST);
        $daoCategory = Application::$category;
        $daoProduct = Application::$product;
        if (isset($_POST['category'])) {
            # code...
            $daoCategory->update($_POST['id'], $_POST['category']);
        }

        $options = [
            'book_id' => $_POST['id'],
            'category' => $_POST['category'],
            'author' => $_POST['authors'],
            'publisher' => $_POST['publishers'],
            'title' => $_POST['title'],
            'price' => $_POST['price'],
            'picture' => $_POST['picture'],
            'discount' => $_POST['discount'],
            'description' => $_POST['description'],
        ];


        $res = $daoProduct->updateProduct($options);
        // print_r($res);
        if ($res) {
            # code...
            header("location: /Admin?select=Manager&options=Products");
        }
    }

    public function AddProductController()
    {
        # code...
        // print_r($_POST);
        $daoCategory = Application::$category;
        $daoProduct = Application::$product;


        $options = [
            'category' => $_POST['category'],
            'author' => $_POST['authors'],
            'publisher' => $_POST['publishers'],
            'title' => $_POST['title'],
            'price' => $_POST['price'],
            'picture' => $_POST['picture'],
            'discount' => $_POST['discount'],
            'description' => $_POST['description'],
        ];

        $res = $daoProduct->addProduct($options);
        $LAST_INSERT_ID = $res->fetch();
        if ($res) {
            # code...
            if (isset($LAST_INSERT_ID["LAST_INSERT_ID()"])) {
                # code...
                $daoCategory->addCategory($LAST_INSERT_ID["LAST_INSERT_ID()"], $_POST['category']);
            }
        }
        header("location: /Admin?select=Manager&options=Products");
    }
    public function DeleteAuthor()
    {
        # code...

        if (isset($_GET['author_id'])) {
            # code...
            $daoAuthors = new Authors();
            $daoAuthors->deleteAuthors($_GET['author_id']);
        }

        header("location: /Admin?select=Manager&options=Authors");
    }

    public function UpdateAuthorController()
    {
        # code...
        print_r($_POST);
        $daoAuthors = new Authors();
        if (isset($_POST['name']) && $_POST['name'] !== null && $_POST['name'] !== '') {
            # code...
            $daoAuthors->updateAuthor($_POST['name'], $_POST['id']);
        }
        header("location: /Admin?select=Manager&options=Authors");
    }

    public function DeletePublisher()
    {
        # code...
        if (isset($_GET['publisher_id'])) {
            # code...
            $daoPublishers = new Publishers();
            $daoPublishers->deletePublisher($_GET['publisher_id']);
        }

        header("location: /Admin?select=Manager&options=Publishers");
    }

    public function UpdatePublisherController()
    {
        # code...
        print_r($_POST);
        $daoPublishers = new Publishers();
        if (isset($_POST['name']) && $_POST['name'] !== null && $_POST['name'] !== '') {
            # code...
            $daoPublishers->updatePublisher($_POST['name'], $_POST['id']);
        }
        header("location: /Admin?select=Manager&options=Publishers");
    }

    public function AddAuthorController()
    {
        $daoAuthors = new Authors();
        if (isset($_POST['title']) && $_POST['title'] !== '') {
            # code...
            $daoAuthors->addAuthor($_POST['title']);
        }

        header("location: /Admin?select=Manager&options=Authors");
    }

    public function AddPublisherController()
    {
        # code...
        $daoPublishers = new Publishers();
        if (isset($_POST['title']) && $_POST['title'] !== '') {
            # code...
            $daoPublishers->addPublisher($_POST['title']);
        }
        header("location: /Admin?select=Manager&options=Publishers");
    }
}
