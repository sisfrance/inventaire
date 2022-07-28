<?php

namespace App\Entity;

use App\Repository\AdresseMailRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdresseMailRepository::class)
 */
class AdresseMail
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\ManyToOne(targetEntity=Courrier::class, inversedBy="adresseMails")
     * @ORM\JoinColumn(nullable=false)
     */
    private $serveur;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $password;

   

    public function __construct()
    {
        $this->Utilisateur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getServeur(): ?Courrier
    {
        return $this->serveur;
    }

    public function setServeur(?Courrier $serveur): self
    {
        $this->serveur = $serveur;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    
}
