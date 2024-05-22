<?php

namespace App\Controller;

use App\Repository\CommunicationRepository;
use App\Service\AuthorizedConsumeApi;
use App\Traits\PermissionAuthorizeTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommunicationController extends AbstractController
{
    use PermissionAuthorizeTrait;
    public function __construct(
        private RequestStack $requestStack,
        private AuthorizedConsumeApi $api,
        private CommunicationRepository $repository
    )
    {
    }

    #[Route('/communications', name: 'app_communication')]
    public function index(): Response
    {
        $this->canAction();
        return new JsonResponse($this->repository->findAll());
    }

    #[Route('/communication/societe/{id}', name: 'app_communication_societe_id', methods: ['GET'],
        requirements: ['id' => '\d+'])]
    public function getSociete(int $id)
    {
        $this->canAction();
        return new JsonResponse($this->repository->getSociete($id));
    }

    #[Route('/communication/salon/{id}', name: 'app_communication_salon_id', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function getSalon(int $id)
    {
        $this->canAction();
        return new JsonResponse($this->repository->getSalon($id));
    }

    #[Route('/communication/societe/{idSociete}/salon/{idSalon}', name: 'app_communication_societe_id_salon_id',
        methods: ['GET'], requirements: ['idSociete' => '\d+','idSalon' => '\d+'])]
    public function getSocieteAndSalon(int $idSociete, int $idSalon)
    {
        $this->canAction();
        return new JsonResponse($this->repository->getSocieteAndSalon($idSociete, $idSalon));
    }

    #[Route('/communication/{id}', name: 'app_communication_id', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function show(int $id)
    {
        $this->canAction();
        return new JsonResponse($this->repository->find($id));
    }


}
