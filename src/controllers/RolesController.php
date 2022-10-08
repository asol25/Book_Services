<?php


namespace app\src\controllers;


use app\src\services\auth\AuthRoles;

class RolesController
{
    public function GetRoleController()
    {
        $role = new AuthRoles();
        print_r($role->GetRole());
    }
}