<?php

namespace CollegeFBWeb\Slim\Middleware;

use Slim\Middleware;
use OAuth\OAuth1\Service\Twitter;
use OAuth\Common\Storage\Session;
use OAuth\Common\Consumer\Credentials;
use OAuth\Common\Http\Uri\UriFactory;
use OAuth\ServiceFactory;
use Slim\Exception\Stop;

class Auth extends Middleware
{
    private $login_url;
    private $logout_url;
    private $after_login_url;

    public function __construct($login_url, $logout_url, $after_login_url)
    {
        $this->login_url = $login_url;
        $this->logout_url = $logout_url;
        $this->after_login_url = $after_login_url;
    }

    public function call()
    {
        try {

            $this->checkUserLogged();

            $this->next->call();
        } catch (Stop $e) {
            $this->app->response()->redirect($e->getMessage());
        }
    }

    private function checkUserLogged()
    {
        $currentUri = $this->getCurrentUri();
        $storage = new Session();
        $twitterService = $this->getTwitterService($storage, $currentUri);
        $request = $this->app->request();

        $oauth_token = $request->params('oauth_token');
        $go_param = $request->params('go');
        $logout_param = $request->params('logout');

        if ($this->isLogoutUrl()) {

            $storage->clearAllTokens();

        } elseif (!empty($oauth_token) || $storage->hasAccessToken('Twitter')) {

            $token = $storage->retrieveAccessToken('Twitter');

            $extra_params = $token->getExtraParams();
            if ($token->isExpired() || empty($extra_params['user_id'])) {
                $twitterService->requestAccessToken(
                    $request->params('oauth_token'),
                    $request->params('oauth_verifier'),
                    $token->getRequestTokenSecret()
                );

                $result = json_decode($twitterService->request('account/verify_credentials.json'));

                if (false === $this->isAuthUser($result)) {
                    throw new Stop($this->app->urlFor($this->login_url));
                }

                throw new Stop($this->app->urlFor($this->after_login_url));
            }

        } elseif (!empty($go_param) && $go_param === 'go') {

            $token = $twitterService->requestRequestToken();

            throw new Stop($twitterService->getAuthorizationUri(array('oauth_token' => $token->getRequestToken())));

        } else {
            if (false === $this->isLoginUrl()) {
                throw new Stop($this->app->urlFor($this->login_url));
            }
        }
    }

    private function getCurrentUri()
    {
        $uriFactory = new UriFactory();
        $currentUri = $uriFactory->createFromSuperGlobalArray($_SERVER);
        $currentUri->setQuery('');

        return $currentUri;
    }

    private function getTwitterService($storage, $currentUri)
    {
        $serviceFactory = new ServiceFactory();

        $credentials = new Credentials(
            $this->app->container['settings']['di']['twitter']['key'],
            $this->app->container['settings']['di']['twitter']['secret'],
            $currentUri->getAbsoluteUri()
        );

        return $serviceFactory->createService('twitter', $credentials, $storage);
    }

    private function isAuthUser($result)
    {
        return in_array($result->screen_name, $this->app->container['settings']['di']['auth_users']);
    }

    private function isLoginUrl()
    {
        $path = $this->app->environment()->offsetGet('PATH_INFO');

        return ($path === $this->app->urlFor($this->login_url));
    }

    private function isLogoutUrl()
    {
        $path = $this->app->environment()->offsetGet('PATH_INFO');

        return ($path === $this->app->urlFor($this->logout_url));
    }
}
