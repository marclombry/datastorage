<?php

namespace App\Controller;

use App\Repository\StatistiqueRepository;
use App\Service\AuthorizedConsumeApi;
use App\Traits\PermissionAuthorizeTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StatistiqueController extends AbstractController
{
    use PermissionAuthorizeTrait;
    public function __construct(
        private RequestStack $requestStack,
        private AuthorizedConsumeApi $api,
        private StatistiqueRepository $repository
    )
    {
    }

    #[Route('/statistiques/commercials/active', name: 'app_statistiques_commercial_active')]
    public function index(): Response
    {
        $this->canAction();
        return new JsonResponse($this->repository->countCommercialActive());
    }

}
