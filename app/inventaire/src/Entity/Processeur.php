<?php

namespace App\Entity;

use App\Repository\ProcesseurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProcesseurRepository::class)
 */
class Processeur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $processeur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProcesseur(): ?string
    {
        return $this->processeur;
    }

    public function setProcesseur(string $processeur): self
    {
        $this->processeur = $processeur;

        return $this;
    }
}
