<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Service\AuthorizedConsumeApi;
use App\Traits\PermissionAuthorizeTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    use PermissionAuthorizeTrait;
    public function __construct(
        private RequestStack $requestStack,
        private AuthorizedConsumeApi $api,
        private CategorieRepository $repository
    )
    {
    }

    #[Route('/categories', name: 'app_categorie')]
    public function index(): Response
    {
        $this->canAction();
        return new JsonResponse($this->repository->findAll());
    }

    #[Route('/categorie/{id}', name: 'app_categorie_id', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function show(int $id)
    {
        $this->canAction();
        return new JsonResponse($this->repository->find($id));
    }

    #[Route('/categorie/count', name: 'app_categorie_count', methods: ['GET'])]
    public function count()
    {
        $this->canAction();
        return new JsonResponse($this->repository->count());
    }
}
