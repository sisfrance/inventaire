<?php

namespace App\Entity;

use App\Repository\OrdinateurViewRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrdinateurViewRepository::class)
 */
class OrdinateurView
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $modele_id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $reference;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $serial_number;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $site_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $utilisateur_id;
    
    private function __construct()
    {
		
	}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModeleId(): ?int
    {
        return $this->modele_id;
    }

    public function setModeleId(?int $modele_id): self
    {
        $this->modele_id = $modele_id;

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

    public function getSerialNumber(): ?string
    {
        return $this->serial_number;
    }

    public function setSerialNumber(?string $serial_number): self
    {
        $this->serial_number = $serial_number;

        return $this;
    }

    public function getSiteId(): ?int
    {
        return $this->site_id;
    }

    public function setSiteId(?int $site_id): self
    {
        $this->site_id = $site_id;

        return $this;
    }

    public function getUtilisateurId(): ?int
    {
        return $this->utilisateur_id;
    }

    public function setUtilisateurId(?int $utilisateur_id): self
    {
        $this->utilisateur_id = $utilisateur_id;

        return $this;
    }
}
