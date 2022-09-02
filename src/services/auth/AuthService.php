<?php

namespace app\src\services\auth;
use Auth0\SDK\Auth0;
use Auth0\SDK\Configuration\SdkConfiguration;
use Auth0\SDK\Exception\ConfigurationException;


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
     * @var Auth0 $sdk is object interaction with Auth0.com.
     */
    public Auth0 $sdk;

//    /**
//     * @var AuthRoutes $routes of the AuthService.
//     */
//    public AuthRoutes $routes;

    /**
     * AuthService constructor.
     */
    public function __construct()
    {
        $this->domain = 'dev-kyhdhfgu.us.auth0.com';
        $this->client_id = 'pwgFU3QagLxrggcJBjkwldc5p5m3Cah0';
        $this->client_secret = 'M_R1jhDP9sikdHJuN0nsl8gj_0su2d9FOMeSP0sG1Y_NoR6SWujC56P1TtB4nf2S';
        $this->redirect_uri =  'http://' . $_SERVER['HTTP_HOST'] . '/callback';

        $this->sdk = new Auth0($this->configuration());
    }

    /**
     * A method initialize Auth0.
     * @return SdkConfiguration The class provides access to Auth0 Platform.
     */
    public function configuration() : SdkConfiguration
    {
        try {
            return new SdkConfiguration(
                domain: $this->domain,
                clientId: $this->client_id,
                redirectUri: $this->redirect_uri,
                clientSecret: $this->client_secret,
                cookieSecret: '4f60eb5de6b5904ad4b8e31d9193e7ea4a3013b476ddb5c259ee9077c05e1457'
             );
        } catch (ConfigurationException $e) {
            echo "<pre>";
            print_r($e);
            echo "</pre>";
        }
    }

    /**
     * Getter method of $sdk
     * @return Auth0 $sdk is object interaction with Auth0.com.
     */
    public function getSdk(): Auth0
    {
        return $this->sdk;
    }

//    /**
//     * Getter method of authRoutes.
//     * @return AuthRoutes $routes of the AuthService.
//     */
//    public function getAuthRoutes(): AuthRoutes
//    {
//        return $this->routes;
//    }
}