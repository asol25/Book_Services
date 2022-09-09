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

        echo "<pre>";
        echo "</pre>";
        $template = [
            'name' => $authenticated ? $session->user['email'] : 'guest',
            'picture' => $authenticated ? $session->user['picture'] : null,
            'session' => $authenticated ? print_r($session, true) : '',
            'auth:route' => $authenticated ? 'logout' : 'login',
            'auth:text' => $authenticated ? 'out' : 'in',
        ];

        printf('<p>Welcome, %s.</p>', $template['name']);
        printf('<p><pre>%s</pre></p>', $template['session']);
        printf('<p><a href="/%s">Log %s</a></p>', $template['auth:route'], $template['auth:text']);
    }
}
