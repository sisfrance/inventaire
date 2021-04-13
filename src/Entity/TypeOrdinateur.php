<?php

namespace App\Entity;

use App\Repository\TypeOrdinateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeOrdinateurRepository::class)
 */
class TypeOrdinateur
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
    private $type_ordinateur;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $abr;

    /**
     * @ORM\OneToMany(targetEntity=Ordinateur::class, mappedBy="type_ordinateur")
     */
    private $ordinateurs;

    public function __construct()
    {
        $this->ordinateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeOrdinateur(): ?string
    {
        return $this->type_ordinateur;
    }

    public function setTypeOrdinateur(?string $type_ordinateur): self
    {
        $this->type_ordinateur = $type_ordinateur;

        return $this;
    }

    public function getAbr(): ?string
    {
        return $this->abr;
    }

    public function setAbr(?string $abr): self
    {
        $this->abr = $abr;

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
            $ordinateur->setTypeOrdinateur($this);
        }

        return $this;
    }

    public function removeOrdinateur(Ordinateur $ordinateur): self
    {
        if ($this->ordinateurs->removeElement($ordinateur)) {
            // set the owning side to null (unless already changed)
            if ($ordinateur->getTypeOrdinateur() === $this) {
                $ordinateur->setTypeOrdinateur(null);
            }
        }

        return $this;
    }
}
