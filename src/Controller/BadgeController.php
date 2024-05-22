<?php

namespace App\Controller;

use App\Repository\BadgeRepository;
use App\Service\AuthorizedConsumeApi;
use App\Traits\PermissionAuthorizeTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class BadgeController extends AbstractController
{
    use PermissionAuthorizeTrait;

    public function __construct(
        private RequestStack         $requestStack,
        private AuthorizedConsumeApi $api,
        private BadgeRepository      $repository,
    )
    {
    }


    #[Route('/badges', name: 'app_badge', methods: ['GET'])]
    public function index(): Response
    {
        $this->canAction();
        return new JsonResponse($this->repository->findAll());
    }

    #[Route('/badges_all', name: 'app_badge_all', methods: ['GET'])]
    public function listeall(): Response
    {
        $this->canAction();
        return new JsonResponse($this->repository->findAll());
    }

    #[Route('/badges/total-person', name: 'app_badge_total_person', methods: ['GET'])]
    public function countAllPerson(): Response
    {
        $this->canAction();
        return new JsonResponse($this->repository->countAllPerson());
    }

    #[Route('/badges/total-exposant', name: 'app_badge_total_exposant', methods: ['GET'])]
    public function countExposant(): Response
    {
        $this->canAction();
        return new JsonResponse($this->repository->countExposant());
    }

    #[Route('/badges/total-visiteur', name: 'app_badge_total_visitor', methods: ['GET'])]
    public function countVisiteur(): Response
    {
        $this->canAction();
        return new JsonResponse($this->repository->countVisitor());
    }

    #[Route('/badges/all_person_visiteur', name: 'app_badge_all_person_visitor', methods: ['GET'])]
    public function personVisiteur(): Response
    {
        $this->canAction();
        return new JsonResponse($this->repository->findAllVisitor());
    }

    #[Route('/badges/all_person_exposant', name: 'app_badge_all_person_exposant', methods: ['GET'])]
    public function personExposant(): Response
    {
        $this->canAction();
        return new JsonResponse($this->repository->findAllExposant());
    }

    #[Route('/badges/all_person', name: 'app_badge_all_person', methods: ['GET'])]
    public function allPerson(): Response
    {
        $this->canAction();
        return new JsonResponse($this->repository->findAllPerson());
    }

    #[Route('/badge/person/{visiteur}', name: 'app_badge_person', methods: ['GET'], requirements: ['visiteur' => '[a-zA-Z]+'])]
    public function visiteurs(string $visiteur)
    {
        $this->canAction();
        return new JsonResponse($this->repository->findAllBadgeBy(['person' => $visiteur]));
    }

    #[Route('/badge/exposant/{exposant}', name: 'app_badge_exposant', methods: ['GET'], requirements: ['exposant' => '[a-zA-Z]+'])]
    public function exposant(string $exposant)
    {
        $this->canAction();
        return new JsonResponse($this->repository->findAllBadgeBy(['exposant' => $exposant]));
    }

    #[Route('/badge/{id}', name: 'app_badge_id', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function show(int $id)
    {
        $this->canAction();
        return new JsonResponse($this->repository->find($id));
    }


}
