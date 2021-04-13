<?php

namespace App\Entity;

use App\Repository\CourrierRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CourrierRepository::class)
 */
class Courrier
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
    private $serveur_entrant;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $securite;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $port_sortant;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $identifiant;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $mdp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getServeurEntrant(): ?string
    {
        return $this->serveur_entrant;
    }

    public function setServeurEntrant(?string $serveur_entrant): self
    {
        $this->serveur_entrant = $serveur_entrant;

        return $this;
    }

    public function getSecurite(): ?string
    {
        return $this->securite;
    }

    public function setSecurite(?string $securite): self
    {
        $this->securite = $securite;

        return $this;
    }

    public function getPortSortant(): ?string
    {
        return $this->port_sortant;
    }

    public function setPortSortant(?string $port_sortant): self
    {
        $this->port_sortant = $port_sortant;

        return $this;
    }

    public function getIdentifiant(): ?string
    {
        return $this->identifiant;
    }

    public function setIdentifiant(?string $identifiant): self
    {
        $this->identifiant = $identifiant;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(?string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }
}
