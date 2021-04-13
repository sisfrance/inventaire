<?php

namespace App\Entity;

use App\Repository\TypePeripheriqueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypePeripheriqueRepository::class)
 */
class TypePeripherique
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
    private $type_peripherique;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypePeripherique(): ?string
    {
        return $this->type_peripherique;
    }

    public function setTypePeripherique(?string $type_peripherique): self
    {
        $this->type_peripherique = $type_peripherique;

        return $this;
    }
}
