<?php

declare(strict_types=1);
namespace app\src\services\auth;

use Auth0\SDK\Auth0;
use Steampixel\Route;

class AuthRoutes extends AuthService implements AuthServiceInterface
{

    private Auth0 $sdk;

    /**
     * AuthRoutes constructor.
     * @param Auth0 $sdk
     */
    public function __construct(Auth0 $sdk)
    {
        $this->sdk = $sdk;
    }

    public function getProfile()
    {
        // TODO: Implement getProfile() method.
        $sdk = $this->sdk;
        Route::add('/', function() use ($sdk) {
            require('profile.php');
        });
    }

    public function login()
    {
        // TODO: Implement login() method.
        $sdk = $this->sdk;
        Route::add('/login', function() use ($sdk) {
            require('login.php');
        });
    }

    public function callback()
    {
        // TODO: Implement callback() method.
        $sdk = $this->sdk;
        Route::add('/callback', function() use ($sdk) {
            require('callback.php');
        });
    }

    public function logout()
    {
        // TODO: Implement logout() method.
        $sdk = $this->sdk;
        Route::add('/logout', function() use ($sdk) {
            require('logout.php');
        });

    }

}