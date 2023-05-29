<?php

namespace App\Entity;

use App\Repository\VillesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VillesRepository::class)]
class Villes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'villeDepart', targetEntity: Vols::class)]
    private Collection $volsDepart;

    #[ORM\OneToMany(mappedBy: 'villeArrivee', targetEntity: Vols::class)]
    private Collection $volsArrivee;

    public function __construct()
    {
        $this->volsDepart = new ArrayCollection();
        $this->volsArrivee = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Vols>
     */
    public function getVolsDepart(): Collection
    {
        return $this->volsDepart;
    }

    public function addVolsDepart(Vols $volsDepart): self
    {
        if (!$this->volsDepart->contains($volsDepart)) {
            $this->volsDepart->add($volsDepart);
            $volsDepart->setVilleDepart($this);
        }

        return $this;
    }

    public function removeVolsDepart(Vols $volsDepart): self
    {
        if ($this->volsDepart->removeElement($volsDepart)) {
            // set the owning side to null (unless already changed)
            if ($volsDepart->getVilleDepart() === $this) {
                $volsDepart->setVilleDepart(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Vols>
     */
    public function getVolsArrivee(): Collection
    {
        return $this->volsArrivee;
    }

    public function addVolsArrivee(Vols $volsArrivee): self
    {
        if (!$this->volsArrivee->contains($volsArrivee)) {
            $this->volsArrivee->add($volsArrivee);
            $volsArrivee->setVilleArrivee($this);
        }

        return $this;
    }

    public function removeVolsArrivee(Vols $volsArrivee): self
    {
        if ($this->volsArrivee->removeElement($volsArrivee)) {
            // set the owning side to null (unless already changed)
            if ($volsArrivee->getVilleArrivee() === $this) {
                $volsArrivee->setVilleArrivee(null);
            }
        }

        return $this;
    }
}
