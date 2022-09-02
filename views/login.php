<?php
declare(strict_types=1);
include_once '../index.php';
/**
 * Prepare application session and redirect to the Auth0 Universal Login page.
 *
 * The user will be redirected to your callback route to complete the authentication flow.
 */

print_r($auth);
//header(sprintf('Location: %s', $auth->getAuthRoutes()->login()));
?>
