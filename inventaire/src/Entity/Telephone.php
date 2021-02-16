<?php

namespace App\Entity;

use App\Repository\TelephoneRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TelephoneRepository::class)
 */
class Telephone
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="Id",type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Emplacement::class,inversedBy="emplacement_telephones")
     * @ORM\JoinColumn(name="emplacement_id", referencedColumnName="Id")
     */
    private $emplacement;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $reference;

    /**
     * @ORM\ManyToOne(targetEntity=Modele::class, inversedBy="telephones")
     * @ORM\JoinColumn(name="modele_id", referencedColumnName="Id")
     */
    private $modele;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $numero;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmplacement(): ?Emplacement
    {
        return $this->emplacement;
    }

    public function setEmplacement(?string $emplacement): self
    {
        $this->emplacement = $emplacement;

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

    public function getModele(): ?Modele
    {
        return $this->modele;
    }

    public function setModele(?Modele $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(?string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }
}
