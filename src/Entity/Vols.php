<?php

namespace App\Entity;

use App\Repository\VolsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VolsRepository::class)]
class Vols
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 6)]
    private ?string $numeroVol = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Hdepart = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Harrivee = null;

    #[ORM\Column]
    private ?int $nbPlace = null;

    #[ORM\Column]
    private ?bool $reduction = null;

    #[ORM\ManyToOne(inversedBy: 'volsDepart')]
    private ?villes $villeDepart = null;

    #[ORM\ManyToOne(inversedBy: 'volsArrivee')]
    private ?villes $villeArrivee = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroVol(): ?string
    {
        return $this->numeroVol;
    }

    public function setNumeroVol(string $numeroVol): self
    {
        $this->numeroVol = $numeroVol;

        return $this;
    }

    public function getHdepart(): ?\DateTimeInterface
    {
        return $this->Hdepart;
    }

    public function setHdepart(\DateTimeInterface $Hdepart): self
    {
        $this->Hdepart = $Hdepart;

        return $this;
    }

    public function getHarrivee(): ?\DateTimeInterface
    {
        return $this->Harrivee;
    }

    public function setHarrivee(\DateTimeInterface $Harrivee): self
    {
        $this->Harrivee = $Harrivee;

        return $this;
    }

    public function getNbPlace(): ?int
    {
        return $this->nbPlace;
    }

    public function setNbPlace(int $nbPlace): self
    {
        $this->nbPlace = $nbPlace;

        return $this;
    }

    public function isReduction(): ?bool
    {
        return $this->reduction;
    }

    public function setReduction(bool $reduction): self
    {
        $this->reduction = $reduction;

        return $this;
    }

}
