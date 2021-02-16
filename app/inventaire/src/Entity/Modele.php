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
     * @ORM\Column(name="Id",type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $modele;

    /**
     * @ORM\ManyToOne(targetEntity=Marque::class, inversedBy="modeles")
     * @ORM\JoinColumn(name="marque_id", referencedColumnName="Id")
     */
    private $marque;

    /**
     * @ORM\OneToMany(targetEntity=Telephone::class, mappedBy="modele")
     */
    private $telephones;

    /**
     * @ORM\OneToMany(targetEntity=Peripherique::class, mappedBy="modele")
     */
    private $yes;

    /**
     * @ORM\OneToMany(targetEntity=Ordinateur::class, mappedBy="modele")
     */
    private $ordinateurs;

    public function __construct()
    {
        $this->telephones = new ArrayCollection();
        $this->yes = new ArrayCollection();
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
     * @return Collection|Telephone[]
     */
    public function getTelephones(): Collection
    {
        return $this->telephones;
    }

    public function addTelephone(Telephone $telephone): self
    {
        if (!$this->telephones->contains($telephone)) {
            $this->telephones[] = $telephone;
            $telephone->setModele($this);
        }

        return $this;
    }

    public function removeTelephone(Telephone $telephone): self
    {
        if ($this->telephones->removeElement($telephone)) {
            // set the owning side to null (unless already changed)
            if ($telephone->getModele() === $this) {
                $telephone->setModele(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Peripherique[]
     */
    public function getYes(): Collection
    {
        return $this->yes;
    }

    public function addYe(Peripherique $ye): self
    {
        if (!$this->yes->contains($ye)) {
            $this->yes[] = $ye;
            $ye->setModele($this);
        }

        return $this;
    }

    public function removeYe(Peripherique $ye): self
    {
        if ($this->yes->removeElement($ye)) {
            // set the owning side to null (unless already changed)
            if ($ye->getModele() === $this) {
                $ye->setModele(null);
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
