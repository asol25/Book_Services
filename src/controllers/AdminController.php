<?php


namespace app\src\controllers;


use app\core\Controller;
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
}