<?php

namespace App\Entity;

use App\Repository\TypeCourrierRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeCourrierRepository::class)
 */
class TypeCourrier
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $type_serveur;
	
	public function __toString(): ?string
	{
			return $this->getTypeServeur();
	}
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeServeur(): ?string
    {
        return $this->type_serveur;
    }

    public function setTypeServeur(string $type_serveur): self
    {
        $this->type_serveur = $type_serveur;

        return $this;
    }
}
