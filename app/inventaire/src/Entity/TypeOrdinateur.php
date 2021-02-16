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
     * @ORM\Column(name="Id",type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity=Ordinateur::class, mappedBy="type")
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
    public function __toString(): ?string
    {
	    return $this->getType();
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
            $ordinateur->setType($this);
        }

        return $this;
    }

    public function removeOrdinateur(Ordinateur $ordinateur): self
    {
        if ($this->ordinateurs->removeElement($ordinateur)) {
            // set the owning side to null (unless already changed)
            if ($ordinateur->getType() === $this) {
                $ordinateur->setType(null);
            }
        }

        return $this;
    }
}
