<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SocieteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SocieteRepository::class)]
#[ApiResource]
class Societe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $idpays = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $code_postal = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fax = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $site_web = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $divers = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $idliste = null;

    #[ORM\Column(nullable: true)]
    private ?int $idlistesimple = null;

    #[ORM\Column(nullable: true)]
    private ?bool $guide = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $datedemande = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateupdate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateinsert = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getIdpays(): ?int
    {
        return $this->idpays;
    }

    public function setIdpays(int $idpays): static
    {
        $this->idpays = $idpays;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(?string $code_postal): static
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(?string $fax): static
    {
        $this->fax = $fax;

        return $this;
    }

    public function getSiteWeb(): ?string
    {
        return $this->site_web;
    }

    public function setSiteWeb(?string $site_web): static
    {
        $this->site_web = $site_web;

        return $this;
    }

    public function getDivers(): ?string
    {
        return $this->divers;
    }

    public function setDivers(?string $divers): static
    {
        $this->divers = $divers;

        return $this;
    }

    public function getIdliste(): ?string
    {
        return $this->idliste;
    }

    public function setIdliste(?string $idliste): static
    {
        $this->idliste = $idliste;

        return $this;
    }

    public function getIdlistesimple(): ?int
    {
        return $this->idlistesimple;
    }

    public function setIdlistesimple(?int $idlistesimple): static
    {
        $this->idlistesimple = $idlistesimple;

        return $this;
    }

    public function isGuide(): ?bool
    {
        return $this->guide;
    }

    public function setGuide(?bool $guide): static
    {
        $this->guide = $guide;

        return $this;
    }

    public function getDatedemande(): ?\DateTimeInterface
    {
        return $this->datedemande;
    }

    public function setDatedemande(?\DateTimeInterface $datedemande): static
    {
        $this->datedemande = $datedemande;

        return $this;
    }

    public function getDateupdate(): ?\DateTimeInterface
    {
        return $this->dateupdate;
    }

    public function setDateupdate(?\DateTimeInterface $dateupdate): static
    {
        $this->dateupdate = $dateupdate;

        return $this;
    }

    public function getDateinsert(): ?\DateTimeInterface
    {
        return $this->dateinsert;
    }

    public function setDateinsert(\DateTimeInterface $dateinsert): static
    {
        $this->dateinsert = $dateinsert;

        return $this;
    }
}
