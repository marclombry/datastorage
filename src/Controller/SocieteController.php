<?php

namespace App\Controller;

use App\Repository\SocieteRepository;
use App\Service\AuthorizedConsumeApi;
use App\Traits\PermissionAuthorizeTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SocieteController extends AbstractController
{
    use PermissionAuthorizeTrait;
    public function __construct(
        private RequestStack $requestStack,
        private AuthorizedConsumeApi $api,
        private SocieteRepository $repository
    )
    {
    }

    #[Route('/societes', name: 'app_societe')]
    public function index(): Response
    {
        $this->canAction();
        return new JsonResponse($this->repository->findAll());
    }

    #[Route('/societe/count', name: 'app_societe_count', methods: ['GET'])]
    public function count()
    {
        $this->canAction();
        return new JsonResponse($this->repository->count());
    }

    #[Route('/societe/salon/{id}', name: 'app_societe_salon_id', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function findSalonById(int $id)
    {
        $this->canAction();
        return new JsonResponse($this->repository->findSalonById($id));
    }

    #[Route('/societe/{id}', name: 'app_societe_id', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function show(int $id)
    {
        $this->canAction();
        return new JsonResponse($this->repository->find($id));
    }



}
