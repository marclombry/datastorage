<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use App\Service\AuthorizedConsumeApi;
use App\Traits\PermissionAuthorizeTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    use PermissionAuthorizeTrait;
    public function __construct(
        private RequestStack $requestStack,
        private AuthorizedConsumeApi $api,
        private ProduitRepository $repository
    )
    {
    }

    #[Route('/produit', name: 'app_produit')]
    public function index(): Response
    {
        $this->canAction();
        return new JsonResponse($this->repository->findAll());
    }

    #[Route('/produit/{id}', name: 'app_produit_id', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function show(int $id)
    {
        $this->canAction();
        return new JsonResponse($this->repository->find($id));
    }
}
