<?php

namespace App\Entity;

use App\Repository\SystemeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SystemeRepository::class)
 */
class Systeme
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
    private $os;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOs(): ?string
    {
        return $this->os;
    }

    public function setOs(?string $os): self
    {
        $this->os = $os;

        return $this;
    }
}
