<?php


namespace app\src\services\auth;

use app\core\Application;

class AuthRoles extends AuthService
{
    /**
     * Getter method for Auth Roles 
     * Returns true if the user is admin or false otherwise.
     */
    public function GetRole(): bool
    {
        $auth = Application::$auth;
        $session = $auth->getCredentials();
        $authenticated = $session !== null;
        
        if ($authenticated) {
            # code...
            $role = "https://example.com/roles";
            $admin = $session->{'user'}[$role];

            if ($admin) {
                # code...
                return true;
            }
        }

        return false;
    }
}
