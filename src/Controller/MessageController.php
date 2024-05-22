<?php

namespace App\Controller;

use App\Repository\MessageRepository;
use App\Service\AuthorizedConsumeApi;
use App\Traits\PermissionAuthorizeTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    use PermissionAuthorizeTrait;
    public function __construct(
        private RequestStack $requestStack,
        private AuthorizedConsumeApi $api,
        private MessageRepository $repository
    )
    {
    }

    #[Route('/message', name: 'app_message')]
    public function index(): Response
    {
        $this->canAction();
        return new JsonResponse($this->repository->findAll());
    }

    #[Route('/message/{id}', name: 'app_message_id', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function show(int $id)
    {
        $this->canAction();
        return new JsonResponse($this->repository->find($id));
    }

    #[Route('/message/count', name: 'app_message_count', methods: ['GET'])]
    public function count()
    {
        $this->canAction();
        return new JsonResponse($this->repository->count());
    }
}
