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
     * @ORM\Column(name="Id",type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=TypePeripherique::class, inversedBy="peripheriques")
     * @ORM\JoinColumn(name="typeperipherique_id", referencedColumnName="id")
     */
    private $type_peripherique;

    /**
     * @ORM\ManyToOne(targetEntity=Modele::class, inversedBy="yes")
     * @ORM\JoinColumn(name="typeperipherique_id", referencedColumnName="Id")
     */
    private $modele;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $reference;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $serialnumber;

    /**
     * @ORM\ManyToOne(targetEntity=Emplacement::class, inversedBy="peripheriques")
     * @ORM\JoinColumn(name="emplacement_id", referencedColumnName="Id")
     */
    private $emplacement;

    /**
     * @ORM\Column(type="text", nullable=true)
     * 
     */
    private $notes;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $ipadresse;

    /**
     * @ORM\ManyToMany(targetEntity=Ordinateur::class, mappedBy="peripheriques")
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

    public function getTypePeripherique(): ?TypePeripherique
    {
        return $this->type_peripherique;
    }

    public function setTypePeripherique(?TypePeripherique $type_peripherique): self
    {
        $this->type_peripherique = $peripherique;

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

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getSerialnumber(): ?string
    {
        return $this->serialnumber;
    }

    public function setSerialnumber(?string $serialnumber): self
    {
        $this->serialnumber = $serialnumber;

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

    public function getIpadresse(): ?string
    {
        return $this->ipadresse;
    }

    public function setIpadresse(?string $ipadresse): self
    {
        $this->ipadresse = $ipadresse;

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
}
