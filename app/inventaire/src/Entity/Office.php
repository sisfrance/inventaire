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
     * @ORM\ManyToOne(targetEntity=Ordinateur::class, inversedBy="offices")
     */
    private $ordinateur;

    /**
     * @ORM\ManyToOne(targetEntity=VersionOffice::class, inversedBy="offices")
     */
    private $version_office;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $courrier;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getVersionOffice(): ?VersionOffice
    {
        return $this->version_office;
    }

    public function setVersionOffice(?VersionOffice $version_office): self
    {
        $this->version_office = $version_office;

        return $this;
    }

    public function getCourrier(): ?string
    {
        return $this->courrier;
    }

    public function setCourrier(?string $courrier): self
    {
        $this->courrier = $courrier;

        return $this;
    }
}
