<?php

namespace App\Controller;

use App\Repository\GeneralRepository;
use App\Service\AuthorizedConsumeApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;


class HomeController extends AbstractController
{
    private RequestStack $requestStack;


    public function __construct(RequestStack $requestStack, AuthorizedConsumeApi $api)
    {
        $this->requestStack = $requestStack;
        $this->api = $api;

    }


    #[Route('/', name: 'app_home')]
    public function index(GeneralRepository $repo): Response
    {
        // verifier le token
        $request = $this->requestStack->getCurrentRequest();
        $api_secret = $request->query->get('api_secret');

        if(!$this->api->isApiAuthorized($this->requestStack))
        {
            return new JsonResponse(null, JsonResponse::HTTP_UNAUTHORIZED);
        }

        return new JsonResponse($repo->findAllByTableName('societe'));

    }
}
