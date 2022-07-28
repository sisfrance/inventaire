<?php

namespace App\Entity;

use App\Repository\PeripheriqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PeripheriqueRepository::class)
 */
class Peripherique
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $reference;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $serial_number;

    /**
     * @ORM\ManyToOne(targetEntity=TypePeripherique::class)
     */
    private $type_peripherique;

    /**
     * @ORM\ManyToOne(targetEntity=Modele::class, inversedBy="peripheriques")
     */
    private $modele;

    /**
     * @ORM\ManyToOne(targetEntity=Emplacement::class, inversedBy="peripheriques")
     */
    private $emplacement;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $notes;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $adresse_ip;

    /**
     * @ORM\ManyToMany(targetEntity=Ordinateur::class, mappedBy="peripheriques")
     */
    private $ordinateurs;

    /**
     * @ORM\OneToMany(targetEntity=Utilisateur::class, mappedBy="peripherique")
     */
    private $utilisateurs;

    public function __construct()
    {
        $this->ordinateurs = new ArrayCollection();
        $this->utilisateurs = new ArrayCollection();
    }
	public function __toString(): ?string
               	{
               		return $this->getTypePeripherique()."-".$this->getReference();
               	}
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getSerialNumber(): ?string
    {
        return $this->serial_number;
    }

    public function setSerialNumber(string $serial_number): self
    {
        $this->serial_number = $serial_number;

        return $this;
    }

    public function getTypePeripherique(): ?TypePeripherique
    {
        return $this->type_peripherique;
    }

    public function setTypePeripherique(?TypePeripherique $type_peripherique): self
    {
        $this->type_peripherique = $type_peripherique;

        return $this;
    }

    public function getModele(): ?Modele
    {
        return $this->modele;
    }

    public function setModele(?Modele $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getEmplacement(): ?Emplacement
    {
        return $this->emplacement;
    }

    public function setEmplacement(?Emplacement $emplacement): self
    {
        $this->emplacement = $emplacement;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getAdresseIp(): ?string
    {
        return $this->adresse_ip;
    }

    public function setAdresseIp(?string $adresse_ip): self
    {
        $this->adresse_ip = $adresse_ip;

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
            $ordinateur->addPeripherique($this);
        }

        return $this;
    }

    public function removeOrdinateur(Ordinateur $ordinateur): self
    {
        if ($this->ordinateurs->removeElement($ordinateur)) {
            $ordinateur->removePeripherique($this);
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
            $utilisateur->setPeripherique($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): self
    {
        if ($this->utilisateurs->removeElement($utilisateur)) {
            // set the owning side to null (unless already changed)
            if ($utilisateur->getPeripherique() === $this) {
                $utilisateur->setPeripherique(null);
            }
        }

        return $this;
    }
}
