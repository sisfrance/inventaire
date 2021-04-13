<?php

namespace App\Entity;

use App\Repository\OfficeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OfficeRepository::class)
 */
class Office
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
    private $version;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $clé;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $compte_office;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getClé(): ?string
    {
        return $this->clé;
    }

    public function setClé(?string $clé): self
    {
        $this->clé = $clé;

        return $this;
    }

    public function getCompteOffice(): ?string
    {
        return $this->compte_office;
    }

    public function setCompteOffice(?string $compte_office): self
    {
        $this->compte_office = $compte_office;

        return $this;
    }
}
