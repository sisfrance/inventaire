<?php

namespace App\Entity;

use App\Repository\ModeleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModeleRepository::class)
 */
class Modele
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $modele;

    /**
     * @ORM\ManyToOne(targetEntity=Marque::class, inversedBy="modeles")
     */
    private $marque;

    /**
     * @ORM\OneToMany(targetEntity=Peripherique::class, mappedBy="modele")
     */
    private $peripheriques;

    /**
     * @ORM\OneToMany(targetEntity=Ordinateur::class, mappedBy="modele")
     */
    private $ordinateurs;

    public function __construct()
    {
        $this->peripheriques = new ArrayCollection();
        $this->ordinateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getMarque(): ?Marque
    {
        return $this->marque;
    }

    public function setMarque(?Marque $marque): self
    {
        $this->marque = $marque;

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
            $peripherique->setModele($this);
        }

        return $this;
    }

    public function removePeripherique(Peripherique $peripherique): self
    {
        if ($this->peripheriques->removeElement($peripherique)) {
            // set the owning side to null (unless already changed)
            if ($peripherique->getModele() === $this) {
                $peripherique->setModele(null);
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
            $ordinateur->setModele($this);
        }

        return $this;
    }

    public function removeOrdinateur(Ordinateur $ordinateur): self
    {
        if ($this->ordinateurs->removeElement($ordinateur)) {
            // set the owning side to null (unless already changed)
            if ($ordinateur->getModele() === $this) {
                $ordinateur->setModele(null);
            }
        }

        return $this;
    }
}
