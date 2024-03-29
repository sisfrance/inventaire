<?php

namespace App\Entity;

use App\Repository\MarqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MarqueRepository::class)
 */
class Marque
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
    private $marque;

    /**
     * @ORM\Column(type="string", length=12, nullable=true)
     */
    private $tel_support;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $mail_support;

    /**
     * @ORM\OneToMany(targetEntity=Modele::class, mappedBy="marque")
     */
    private $modeles;

    public function __construct()
    {
        $this->modeles = new ArrayCollection();
    }
	
	public function __toString()
	{
		return $this->getMarque();
	}
	
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(?string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getTelSupport(): ?string
    {
        return $this->tel_support;
    }

    public function setTelSupport(?string $tel_support): self
    {
        $this->tel_support = $tel_support;

        return $this;
    }

    public function getMailSupport(): ?string
    {
        return $this->mail_support;
    }

    public function setMailSupport(?string $mail_support): self
    {
        $this->mail_support = $mail_support;

        return $this;
    }

    /**
     * @return Collection|Modele[]
     */
    public function getModeles(): Collection
    {
        return $this->modeles;
    }

    public function addModele(Modele $modele): self
    {
        if (!$this->modeles->contains($modele)) {
            $this->modeles[] = $modele;
            $modele->setMarque($this);
        }

        return $this;
    }

    public function removeModele(Modele $modele): self
    {
        if ($this->modeles->removeElement($modele)) {
            // set the owning side to null (unless already changed)
            if ($modele->getMarque() === $this) {
                $modele->setMarque(null);
            }
        }

        return $this;
    }
}
