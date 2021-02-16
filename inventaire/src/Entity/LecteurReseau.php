<?php

namespace App\Entity;

use App\Repository\LecteurReseauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LecteurReseauRepository::class)
 */
class LecteurReseau
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=16, nullable=true)
     */
    private $adresse_ip;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $nom_hote;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $nom_partage;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $chemin_complet;


    /**
     * @ORM\ManyToMany(targetEntity=Session::class, inversedBy="lecteurReseaux")
     */
    private $session;

    /**
     * @ORM\ManyToOne(targetEntity=Ordinateur::class, inversedBy="yes")
     */
    private $ordinateur;

    public function __construct()
    {
        $this->session = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNomHote(): ?string
    {
        return $this->nom_hote;
    }

    public function setNomHote(?string $nom_hote): self
    {
        $this->nom_hote = $nom_hote;

        return $this;
    }

    public function getNomPartage(): ?string
    {
        return $this->nom_partage;
    }

    public function setNomPartage(?string $nom_partage): self
    {
        $this->nom_partage = $nom_partage;

        return $this;
    }

    public function getCheminComplet(): ?string
    {
        return $this->chemin_complet;
    }

    public function setCheminComplet(?string $chemin_complet): self
    {
        $this->chemin_complet = $chemin_complet;

        return $this;
    }

    /**
     * @return Collection|Session[]
     */
    public function getSession(): Collection
    {
        return $this->session;
    }

    public function addSession(Session $session): self
    {
        if (!$this->session->contains($session)) {
            $this->session[] = $session;
        }

        return $this;
    }

    public function removeSession(Session $session): self
    {
        $this->session->removeElement($session);

        return $this;
    }

    public function getOrdinateur(): ?Ordinateur
    {
        return $this->ordinateur;
    }

    public function setOrdinateur(?Ordinateur $ordinateur): self
    {
        $this->ordinateur = $ordinateur;

        return $this;
    }
}
