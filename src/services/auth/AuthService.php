<?php


namespace app\src\services\auth;
use Auth0\SDK\Auth0;
use Auth0\SDK\Exception\CoreException;
use Steampixel\Route;

class AuthService
{
    /**
     * @var string $domain of the AuthService.
     */
    private string $domain;

    /**
     * @var string $client_id of the AuthService.
     */
    private string $client_id;

    /**
     * @var string $client_secret of the AuthService.
     */
    private string $client_secret;

    /**
     * @var string $redirect_uri of the AuthService.
     */
    private string $redirect_uri;

    /**
     * @var AuthRoutes $authRoutes of the AuthService.
     */
    public AuthRoutes $authRoutes;

    /**
     * AuthService constructor.
     */
    public function __construct()
    {
        $this->domain = 'dev-kyhdhfgu.us.auth0.com';
        $this->client_id = 'pwgFU3QagLxrggcJBjkwldc5p5m3Cah0';
        $this->client_secret = 'M_R1jhDP9sikdHJuN0nsl8gj_0su2d9FOMeSP0sG1Y_NoR6SWujC56P1TtB4nf2S';
        $this->redirect_uri = 'http://localhost:8000/';
        $this->authRoutes = new AuthRoutes($this->configuration());
    }

    /**
     * Getter method of authRoutes.
     * @return AuthRoutes authRoutes of the AuthService.
     */
    public function getAuthRoutes(): AuthRoutes
    {
        return $this->authRoutes;
    }

    /**
     * A method initialize Auth0.
     * @return Auth0 The class provides access to Auth0 Platform.
     */
    public function configuration() : Auth0
    {
        try {
            return new Auth0([
                 'domain' => $this->domain,
                 'client_id' => $this->client_id,
                 'client_secret' => $this->client_secret,
                 'redirect_uri' => $this->redirect_uri,
             ]);
        } catch (CoreException $e) {
            echo "<pre>";
            print_r($e);
            echo "</pre>";
        }
    }
}