<?php

namespace app\src\services\auth;
use Auth0\SDK\Exception\ConfigurationException;

class AuthRoutes extends AuthService implements AuthServiceInterface
{
    public function login()
    {
        // TODO: Implement login() method.
        try {
                if (isset($this->sdk))
                    header(sprintf('Location: %s', $this->getSdk()->login()));
        }
        catch (ConfigurationException $e) {
                print_r($e);
        }
    }

    public function callback()
    {
        // TODO: Implement callback() method.

    }

    public function logout()
    {
        // TODO: Implement logout() method.
        try {
            if (isset($this->sdk))
                header(sprintf('Location: %s', $this->getSdk()->logout()));
        }
        catch (ConfigurationException $e) {
            print_r($e);
        }
    }

}