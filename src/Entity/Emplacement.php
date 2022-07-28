<?php

namespace App\Entity;

use App\Repository\EmplacementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmplacementRepository::class)
 */
class Emplacement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $emplacement;

    /**
     * @ORM\ManyToOne(targetEntity=Site::class, inversedBy="emplacements")
     */
    private $site;

    /**
     * @ORM\OneToMany(targetEntity=Peripherique::class, mappedBy="emplacement")
     */
    private $peripheriques;

    /**
     * @ORM\OneToMany(targetEntity=Utilisateur::class, mappedBy="emplacement")
     */
    private $utilisateurs;

    /**
     * @ORM\OneToMany(targetEntity=Service::class, mappedBy="emplacement")
     */
    private $services;

    /**
     * @ORM\OneToMany(targetEntity=Ordinateur::class, mappedBy="emplacement")
     */
    private $ordinateurs;

    public function __construct()
    {
        $this->peripheriques = new ArrayCollection();
        $this->utilisateurs = new ArrayCollection();
        $this->services = new ArrayCollection();
        $this->ordinateurs = new ArrayCollection();
    }
	
	public function __toString()
	{
		return $this->getEmplacement();
	}
	
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmplacement(): ?string
    {
        return $this->emplacement;
    }

    public function setEmplacement(?string $emplacement): self
    {
        $this->emplacement = $emplacement;

        return $this;
    }

    public function getSite(): ?Site
    {
        return $this->site;
    }

    public function setSite(?Site $site): self
    {
        $this->site = $site;

        return $this;
    }

    /**
     * @return Collection|Peripherique[]
     */
    public function getPeripheriques(): Collection
    {
        return $this->peripheriques;
    }

    public function addPeripherique(Peripherique $peripherique): self
    {
        if (!$this->peripheriques->contains($peripherique)) {
            $this->peripheriques[] = $peripherique;
            $peripherique->setEmplacement($this);
        }

        return $this;
    }

    public function removePeripherique(Peripherique $peripherique): self
    {
        if ($this->peripheriques->removeElement($peripherique)) {
            // set the owning side to null (unless already changed)
            if ($peripherique->getEmplacement() === $this) {
                $peripherique->setEmplacement(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(Utilisateur $utilisateur): self
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs[] = $utilisateur;
            $utilisateur->setEmplacement($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): self
    {
        if ($this->utilisateurs->removeElement($utilisateur)) {
            // set the owning side to null (unless already changed)
            if ($utilisateur->getEmplacement() === $this) {
                $utilisateur->setEmplacement(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Service[]
     */
    public function getServices(): Collection
    {
        return $this->services;
    }

    public function addService(Service $service): self
    {
        if (!$this->services->contains($service)) {
            $this->services[] = $service;
            $service->setEmplacement($this);
        }

        return $this;
    }

    public function removeService(Service $service): self
    {
        if ($this->services->removeElement($service)) {
            // set the owning side to null (unless already changed)
            if ($service->getEmplacement() === $this) {
                $service->setEmplacement(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Ordinateur[]
     */
    public function getOrdinateurs(): Collection
    {
        return $this->ordinateurs;
    }

    public function addOrdinateur(Ordinateur $ordinateur): self
    {
        if (!$this->ordinateurs->contains($ordinateur)) {
            $this->ordinateurs[] = $ordinateur;
            $ordinateur->setEmplacement($this);
        }

        return $this;
    }

    public function removeOrdinateur(Ordinateur $ordinateur): self
    {
        if ($this->ordinateurs->removeElement($ordinateur)) {
            // set the owning side to null (unless already changed)
            if ($ordinateur->getEmplacement() === $this) {
                $ordinateur->setEmplacement(null);
            }
        }

        return $this;
    }
}
