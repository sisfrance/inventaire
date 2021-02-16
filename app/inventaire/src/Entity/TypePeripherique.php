<?php

namespace App\Entity;

use App\Repository\TypePeripheriqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypePeripheriqueRepository::class)
 */
class TypePeripherique
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
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $abr;

    /**
     * @ORM\OneToMany(targetEntity=Peripherique::class, mappedBy="relation")
     */
    private $peripheriques;

    public function __construct()
    {
        $this->peripheriques = new ArrayCollection();
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
            $peripherique->setRelation($this);
        }

        return $this;
    }

    public function removePeripherique(Peripherique $peripherique): self
    {
        if ($this->peripheriques->removeElement($peripherique)) {
            // set the owning side to null (unless already changed)
            if ($peripherique->getRelation() === $this) {
                $peripherique->setRelation(null);
            }
        }

        return $this;
    }
    public function __toString(): ?string
    {
		return $this->getType();
	}
}
