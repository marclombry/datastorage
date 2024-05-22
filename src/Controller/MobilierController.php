<?php

namespace App\Controller;

use App\Repository\MobilierRepository;
use App\Service\AuthorizedConsumeApi;
use App\Traits\PermissionAuthorizeTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MobilierController extends AbstractController
{
    use PermissionAuthorizeTrait;
    public function __construct(
        private RequestStack $requestStack,
        private AuthorizedConsumeApi $api,
        private MobilierRepository $repository
    )
    {
    }

    #[Route('/mobilier', name: 'app_mobilier')]
    public function index(): Response
    {
        $this->canAction();
        return new JsonResponse($this->repository->findAll());
    }

    #[Route('/mobilier/salon/{id}', name: 'app_mobilier_salon_id', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function findBySalon(int $id)
    {
        $this->canAction();
        return new JsonResponse($this->repository->findBySalon($id));
    }

    #[Route('/mobilier/societe/{id}', name: 'app_mobilier_societe_id', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function findBySociete(int $id)
    {
        $this->canAction();
        return new JsonResponse($this->repository->findBySociete($id));
    }

    #[Route('/mobilier/societe/{idSociete}/salon/{idSalon}', name: 'app_mobilier_societe_id_salon_id',
        methods: ['GET'], requirements: ['idSociete' => '\d+','idSalon' => '\d+'])]
    public function findBySocieteAndSalon(int $idSociete, int $idSalon)
    {
        $this->canAction();
        return new JsonResponse($this->repository->findBySocieteAndSalon($idSociete,$idSalon));
    }

    #[Route('/mobilier/societes/salons', name: 'app_mobilier_societes_salons',
        methods: ['GET'])]
    public function findMobilierPerSocieteAndSalon()
    {
        $this->canAction();
        return new JsonResponse($this->repository->findMobilierPerSocieteAndSalon());
    }

    #[Route('/mobilier/{id}', name: 'app_mobilier_id', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function show(int $id)
    {
        $this->canAction();
        return new JsonResponse($this->repository->find($id));
    }


}
