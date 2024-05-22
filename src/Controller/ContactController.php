<?php

namespace App\Controller;

use App\Repository\ContactRepository;
use App\Service\AuthorizedConsumeApi;
use App\Traits\PermissionAuthorizeTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    use PermissionAuthorizeTrait;
    public function __construct(
        private RequestStack $requestStack,
        private AuthorizedConsumeApi $api,
        private ContactRepository $repository
    )
    {
    }

    #[Route('/contacts', name: 'app_contact')]
    public function index(): Response
    {
        $this->canAction();
        return new JsonResponse($this->repository->findAll());
    }

    #[Route('/contact/{id}', name: 'app_contact_id', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function show(int $id)
    {
        $this->canAction();
        return new JsonResponse($this->repository->find($id));
    }
}
