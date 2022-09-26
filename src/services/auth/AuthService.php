<?php

namespace app\src\services\auth;
use Auth0\SDK\Auth0;
use Auth0\SDK\Configuration\SdkConfiguration;
use Auth0\SDK\Exception\ConfigurationException;


class AuthService implements AuthServiceInterface
{

    //DO_NOT_EDIT_BELOW_THIS_LINE
    
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

    /**
     * AuthService constructor.
     */
    public function __construct()
    {
        $this->domain = 'dev-kyhdhfgu.us.auth0.com';
        $this->client_id = 'OX1MW0dPNSWwWFCNnscwABjsAXwSVhYN';
        $this->client_secret = 'ovv7mIvfOjbJ5c1TZg7mutOiBLCStUTfVmGOTzNu7QWhE70I-uDvk7vNZ7_Ybtgx';
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
     * A method login via the Auth0.
     */
    public function login()
    {
        // TODO: Implement login() method.
        try {
            if (isset($this->sdk))
                header(sprintf('Location: %s', $this->sdk->login()));
        }
        catch (ConfigurationException $e) {
            echo "<pre>";
            print_r($e);
            echo "</pre>";
        }
    }

    /**
     * A method logout via the Auth0.
     */
    public function logout()
    {
        // TODO: Implement logout() method.
        try {
            if (isset($this->sdk))
                $this->sdk->clear();
                header(sprintf('Location: /',));
        }
        catch (ConfigurationException $e) {
            echo "<pre>";
            print_r($e);
            echo "</pre>";
        }
    }

    /**
     * A method callback via the Auth0.
     * Upon returning from the Auth0 Universal Login, we need to perform a code exchange using the `exchange()` method
     * to complete the authentication flow. This process configures the session for use by the application.
     *
     * If successful, the user will be redirected back to the index route.
     */
    public function callback() : void
    {
        // TODO: Implement callback() method.

        $hasAuthenticated = isset($_GET['state']) && isset($_GET['code']);
        $hasAuthenticationFailure = isset($_GET['error']);

        // The end user will be returned with ?state and ?code values in their request, when successful.
        if ($hasAuthenticated) {
            try {
                print_r($_GET);
                $this->sdk->exchange();
            } catch (\Throwable $th) {
                printf('Unable to complete authentication: %s', $th->getMessage());
                exit;
            }
        }

        // When authentication was unsuccessful, the end user will be returned with an ?error in their request.
        if ($hasAuthenticationFailure) {
            printf('Authentication failure: %s', htmlspecialchars(strip_tags(filter_input(INPUT_GET, 'error'))));
            exit;
        }


        // Nothing to do: redirect to index route.
        header('Location: /');
    }

    /**
     * A method checked for getCredentials. If account have been login return Object, FALSE otherwise.
     * @return object|null of getCredentials.
     */
    public function getCredentials(): ?object
    {
        // TODO: Implement getCredentials() method.
        return $this->sdk->getCredentials();
    }

    /**
     * Getter method for $sdk.
     * @return Auth0 $sdk of the AuthService.
     */
    public function getSdk(): Auth0
    {
        return $this->sdk;
    }
}