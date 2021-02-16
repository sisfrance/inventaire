<?php

namespace App\Entity;

use App\Repository\SessionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SessionRepository::class)
 */
class Session
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $identifiant;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $mdp;

    /**
     * @ORM\ManyToMany(targetEntity=Utilisateur::class, inversedBy="sessions")
     */
    private $utilisateur;

    /**
     * @ORM\ManyToMany(targetEntity=LecteurReseau::class, mappedBy="session")
     */
    private $lecteurReseaux;

    public function __construct()
    {
        $this->utilisateur = new ArrayCollection();
        $this->lecteurReseaux = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getIdentifiant(): ?string
    {
        return $this->identifiant;
    }

    public function setIdentifiant(string $identifiant): self
    {
        $this->identifiant = $identifiant;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(?string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getUtilisateur(): Collection
    {
        return $this->utilisateur;
    }

    public function addUtilisateur(Utilisateur $utilisateur): self
    {
        if (!$this->utilisateur->contains($utilisateur)) {
            $this->utilisateur[] = $utilisateur;
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): self
    {
        $this->utilisateur->removeElement($utilisateur);

        return $this;
    }

    /**
     * @return Collection|LecteurReseau[]
     */
    public function getLecteurReseaux(): Collection
    {
        return $this->lecteurReseaux;
    }

    public function addLecteurReseaux(LecteurReseau $lecteurReseaux): self
    {
        if (!$this->lecteurReseaux->contains($lecteurReseaux)) {
            $this->lecteurReseaux[] = $lecteurReseaux;
            $lecteurReseaux->addSession($this);
        }

        return $this;
    }

    public function removeLecteurReseaux(LecteurReseau $lecteurReseaux): self
    {
        if ($this->lecteurReseaux->removeElement($lecteurReseaux)) {
            $lecteurReseaux->removeSession($this);
        }

        return $this;
    }
}
