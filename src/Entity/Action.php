<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ActionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActionRepository::class)]
#[ApiResource]
class Action
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idutilisateur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $objet = null;

    #[ORM\Column(nullable: true)]
    private ?int $idobjet = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $typeaction = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateaction = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdutilisateur(): ?int
    {
        return $this->idutilisateur;
    }

    public function setIdutilisateur(int $idutilisateur): static
    {
        $this->idutilisateur = $idutilisateur;

        return $this;
    }

    public function getObjet(): ?string
    {
        return $this->objet;
    }

    public function setObjet(?string $objet): static
    {
        $this->objet = $objet;

        return $this;
    }

    public function getIdobjet(): ?int
    {
        return $this->idobjet;
    }

    public function setIdobjet(?int $idobjet): static
    {
        $this->idobjet = $idobjet;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTypeaction(): ?string
    {
        return $this->typeaction;
    }

    public function setTypeaction(?string $typeaction): static
    {
        $this->typeaction = $typeaction;

        return $this;
    }

    public function getDateaction(): ?\DateTimeInterface
    {
        return $this->dateaction;
    }

    public function setDateaction(?\DateTimeInterface $dateaction): static
    {
        $this->dateaction = $dateaction;

        return $this;
    }
}
