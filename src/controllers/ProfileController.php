<?php


namespace app\src\controllers;

use app\core\Application;
use app\core\Controller;

class ProfileController extends Controller
{
    public function ProfileController()
    {
        $auth = Application::$auth;
        $session = $auth->getCredentials();
        $authenticated = $session !== null;

        $template = [
            'name' => $authenticated ? $session->user['email'] : 'guest',
            'picture' => $authenticated ? $session->user['picture'] : null,
            'session' => $authenticated ? print_r($session, true) : '',
            'auth:route' => $authenticated ? 'logout' : 'login',
            'auth:text' => $authenticated ? 'out' : 'in',
        ];

        echo "<pre>";
        print_r($template['session']->{'accessToken'});
        echo "</pre>";
        $views = "ProfilePage";
        $this->render($views, ["template" => $template]);
    }
}
