<?php

namespace App\Entity;

use App\Repository\CourrierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private $serveur_reception;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $securite_reception;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $port_reception;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $serveur_emission;


    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $port_emission;

    /**
     * @ORM\ManyToOne(targetEntity=TypeCourrier::class)
     */
    private $type_serveur_reception;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="courriers")
     */
    private $client;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $notes;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $domaine;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $securite_emission;

    /**
     * @ORM\OneToMany(targetEntity=AdresseMail::class, mappedBy="serveur")
     */
    private $adresseMails;

    public function __construct()
    {
        $this->adresseMails = new ArrayCollection();
    }

    public function getId(): ?int
    {
		return $this->id;
	}
	public function setId(?int $id): self
                                     {
                                 		$this->id=$id;
                                 		return $this;
                                     }
    public function getServeurReception(): ?string
    {
        return $this->serveur_reception;
    }

    public function setServeurReception(?string $serveur_reception): self
    {
        $this->serveur_reception = $serveur_reception;

        return $this;
    }

    public function getSecuriteReception(): ?string
    {
        return $this->securite_reception;
    }

    public function setSecuriteReception(?string $securite_reception): self
    {
        $this->securite_reception = $securite_reception;

        return $this;
    }
    public function getPortReception(): ?string
    {
		return $this->port_reception;
	}
	public function setPortReception(?string $port_reception): self
                        	{
                        		$this->port_reception=$port_reception;
                        		return $this;
                        	}

    public function getServeurEmission(): ?string
    {
        return $this->serveur_emission;
    }

    public function setServeurEmission(?string $serveur_emission): self
    {
        $this->serveur_emission = $serveur_emission;

        return $this;
    }


    public function getPortEmission(): ?string
    {
        return $this->port_emission;
    }

    public function setPortEmission(?string $port_emission): self
    {
        $this->port_emission = $port_emission;

        return $this;
    }

    public function getTypeServeurReception(): ?TypeCourrier
    {
        return $this->type_serveur_reception;
    }

    public function setTypeServeurReception(?TypeCourrier $type_serveur_reception): self
    {
        $this->type_serveur_reception = $type_serveur_reception;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getDomaine(): ?string
    {
        return $this->domaine;
    }

    public function setDomaine(?string $domaine): self
    {
        $this->domaine = $domaine;

        return $this;
    }

    public function getSecuriteEmission(): ?string
    {
        return $this->securite_emission;
    }

    public function setSecuriteEmission(?string $securite_emission): self
    {
        $this->securite_emission = $securite_emission;

        return $this;
    }

    /**
     * @return Collection|AdresseMail[]
     */
    public function getAdresseMails(): Collection
    {
        return $this->adresseMails;
    }

    public function addAdresseMail(AdresseMail $adresseMail): self
    {
        if (!$this->adresseMails->contains($adresseMail)) {
            $this->adresseMails[] = $adresseMail;
            $adresseMail->setServeur($this);
        }

        return $this;
    }

    public function removeAdresseMail(AdresseMail $adresseMail): self
    {
        if ($this->adresseMails->removeElement($adresseMail)) {
            // set the owning side to null (unless already changed)
            if ($adresseMail->getServeur() === $this) {
                $adresseMail->setServeur(null);
            }
        }

        return $this;
    }


}
