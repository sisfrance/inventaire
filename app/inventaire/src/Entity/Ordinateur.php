<?php

namespace App\Entity;

use App\Repository\OrdinateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrdinateurRepository::class)
 */
class Ordinateur
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
    private $reference;

    /**
     * @ORM\ManyToOne(targetEntity=Modele::class, inversedBy="ordinateurs")
     */
    private $modele;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $serial_number;

    /**
     * @ORM\ManyToOne(targetEntity=TypeOrdinateur::class, inversedBy="ordinateurs")
     */
    private $type_ordinateur;

    /**
     * @ORM\ManyToOne(targetEntity=Processeur::class)
     */
    private $processeur;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $memoire;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_achat;

    /**
     * @ORM\ManyToOne(targetEntity=Fournisseur::class, inversedBy="ordinateurs")
     */
    private $fournisseur;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $adresse_ip;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $notes;

    /**
     * @ORM\ManyToOne(targetEntity=Systeme::class)
     */
    private $operating_system;

    /**
     * @ORM\ManyToMany(targetEntity=Peripherique::class, inversedBy="ordinateurs")
     */
    private $peripheriques;

    /**
     * @ORM\ManyToMany(targetEntity=Utilisateur::class, inversedBy="ordinateurs")
     */
    private $utilisateurs;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $nom;

    public function __construct()
    {
        $this->peripheriques = new ArrayCollection();
        $this->utilisateurs = new ArrayCollection();
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

    public function getModele(): ?Modele
    {
        return $this->modele;
    }

    public function setModele(?Modele $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getSerialNumber(): ?string
    {
        return $this->serial_number;
    }

    public function setSerialNumber(?string $serial_number): self
    {
        $this->serial_number = $serial_number;

        return $this;
    }

    public function getTypeOrdinateur(): ?TypeOrdinateur
    {
        return $this->type_ordinateur;
    }

    public function setTypeOrdinateur(?TypeOrdinateur $type_ordinateur): self
    {
        $this->type_ordinateur = $type_ordinateur;

        return $this;
    }

    public function getProcesseur(): ?Processeur
    {
        return $this->processeur;
    }

    public function setProcesseur(?Processeur $processeur): self
    {
        $this->processeur = $processeur;

        return $this;
    }

    public function getMemoire(): ?string
    {
        return $this->memoire;
    }

    public function setMemoire(?string $memoire): self
    {
        $this->memoire = $memoire;

        return $this;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->date_achat;
    }

    public function setDateAchat(?\DateTimeInterface $date_achat): self
    {
        $this->date_achat = $date_achat;

        return $this;
    }

    public function getFournisseur(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Fournisseur $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

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

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getOperatingSystem(): ?Systeme
    {
        return $this->operating_system;
    }

    public function setOperatingSystem(?Systeme $operating_system): self
    {
        $this->operating_system = $operating_system;

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
        }

        return $this;
    }

    public function removePeripherique(Peripherique $peripherique): self
    {
        $this->peripheriques->removeElement($peripherique);

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
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): self
    {
        $this->utilisateurs->removeElement($utilisateur);

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom_pc): self
    {
        $this->nom_pc = $nom;

        return $this;
    }
}
