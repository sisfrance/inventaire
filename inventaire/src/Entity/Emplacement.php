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
     * 
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $etage;



    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $numero;

    /**
     * @ORM\OneToMany(targetEntity=Peripherique::class, mappedBy="emplacement")
     */
    private $peripheriques;

    /**
     * @ORM\OneToMany(targetEntity=Ordinateur::class, mappedBy="emplacement")
     */
    private $ordinateurs;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $batiment;

    /**
     * @ORM\OneToMany(targetEntity=PosteDeTravail::class, mappedBy="emplacement")
     */
    private $posteDeTravails;

    /**
     * @ORM\ManyToOne(targetEntity=Site::class, inversedBy="emplacements")
     */
    private $site;

    public function __construct()
    {
        $this->peripheriques = new ArrayCollection();
        $this->ordinateurs = new ArrayCollection();
        $this->posteDeTravails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtage(): ?string
    {
        return $this->etage;
    }

    public function setEtage(string $etage): self
    {
        $this->etage = $etage;

        return $this;
    }


    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(?string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }
    public function __toString(): ?string
    {
	    return $this->getService();	
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

    public function getBatiment(): ?string
    {
        return $this->batiment;
    }

    public function setBatiment(?string $batiment): self
    {
        $this->batiment = $batiment;

        return $this;
    }

    /**
     * @return Collection|PosteDeTravail[]
     */
    public function getPosteDeTravails(): Collection
    {
        return $this->posteDeTravails;
    }

    public function addPosteDeTravail(PosteDeTravail $posteDeTravail): self
    {
        if (!$this->posteDeTravails->contains($posteDeTravail)) {
            $this->posteDeTravails[] = $posteDeTravail;
            $posteDeTravail->setEmplacement($this);
        }

        return $this;
    }

    public function removePosteDeTravail(PosteDeTravail $posteDeTravail): self
    {
        if ($this->posteDeTravails->removeElement($posteDeTravail)) {
            // set the owning side to null (unless already changed)
            if ($posteDeTravail->getEmplacement() === $this) {
                $posteDeTravail->setEmplacement(null);
            }
        }

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
}
