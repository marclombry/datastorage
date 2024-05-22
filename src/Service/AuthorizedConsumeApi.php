<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class AuthorizedConsumeApi
{

    public function __construct(private $apiSecret, private $apiToken, private $apiPass, private $apiName)
    {
    }

    /**
     * @return mixed
     */
    public function getApiSecret() :mixed
    {
        return $this->apiSecret;
    }

    /**
     * @return mixed
     */
    public function getApiToken() :mixed
    {
        return $this->apiToken;
    }

    /**
     * @return mixed
     */
    public function getApiPass() :mixed
    {
        return $this->apiPass;
    }

    /**
     * @return mixed
     */
    public function getApiName() :mixed
    {
        return $this->apiName;
    }

    /**
     * @param RequestStack $requestStack
     * @return bool
     */
    public function isAuthorized(RequestStack $requestStack) :bool
    {
        $request = $requestStack->getCurrentRequest();
        $apiSecretQuery = $request->query->get('api_secret') ?? null;
        return $this->getApiSecret() === $apiSecretQuery;
    }

    /**
     * @param RequestStack $requestStack
     * @return bool
     */
    public function isApiAuthorized(RequestStack $requestStack) :bool
    {
        $request = $requestStack->getCurrentRequest();
        $secretQuery = $request->query->get('api_secret') ?? null;
        $tokenQuery = $request->query->get('api_token') ?? null;
        $passQuery = $request->query->get('api_pass') ?? null;
        $nameQuery = $request->query->get('api_name') ?? null;

        $apiSecret = $this->getApiSecret() ?? null;
        $apiToken = $this->getApiToken() ?? null;
        $apiPass = $this->getApiPass() ?? null;
        $apiName = $this->getApiName() ?? null;

        return $secretQuery === $apiSecret && $tokenQuery === $apiToken
            && $passQuery === $apiPass && $nameQuery === $apiName;
    }
}