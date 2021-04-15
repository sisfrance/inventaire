<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 */
class Utilisateur
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\ManyToOne(targetEntity=Fonction::class)
     */
    private $fonction;

    /**
     * @ORM\ManyToOne(targetEntity=Emplacement::class, inversedBy="utilisateurs")
     */
    private $emplacement;

    /**
     * @ORM\ManyToMany(targetEntity=Ordinateur::class, mappedBy="utilisateurs")
     */
    private $ordinateurs;

    /**
     * @ORM\OneToMany(targetEntity=Session::class, mappedBy="utilisateur")
     */
    private $sessions;

    /**
     * @ORM\OneToMany(targetEntity=Vpn::class, mappedBy="utilisateur")
     */
    private $vpns;

    /**
     * @ORM\ManyToOne(targetEntity=Service::class, inversedBy="utilisateurs")
     */
    private $service;

    /**
     * @ORM\OneToMany(targetEntity=Courrier::class, mappedBy="utilisateur")
     */
    private $courriers;

    public function __construct()
    {
        $this->ordinateurs = new ArrayCollection();
        $this->sessions = new ArrayCollection();
        $this->vpns = new ArrayCollection();
        $this->courriers = new ArrayCollection();
    }
	public function __toString(): ?string
               	{
               			return $this->getNom()." : ".$this->getPrenom();
               	}
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getFonction(): ?Fonction
    {
        return $this->fonction;
    }

    public function setFonction(?Fonction $fonction): self
    {
        $this->fonction = $fonction;

        return $this;
    }

    public function getEmplacement(): ?Emplacement
    {
        return $this->emplacement;
    }

    public function setEmplacement(?Emplacement $emplacement): self
    {
        $this->emplacement = $emplacement;

        return $this;
    }

    /**
     * @return Collection|Ordinateur[]
     */
    public function getOrdinateurs(): Collection
    {
        return $this->ordinateurs;
    }

    public function addOrdinateur(Ordinateur $ordinateur): self
    {
        if (!$this->ordinateurs->contains($ordinateur)) {
            $this->ordinateurs[] = $ordinateur;
            $ordinateur->addUtilisateur($this);
        }

        return $this;
    }

    public function removeOrdinateur(Ordinateur $ordinateur): self
    {
        if ($this->ordinateurs->removeElement($ordinateur)) {
            $ordinateur->removeUtilisateur($this);
        }

        return $this;
    }

    /**
     * @return Collection|Session[]
     */
    public function getSessions(): Collection
    {
        return $this->sessions;
    }

    public function addSession(Session $session): self
    {
        if (!$this->sessions->contains($session)) {
            $this->sessions[] = $session;
            $session->setUtilisateur($this);
        }

        return $this;
    }

    public function removeSession(Session $session): self
    {
        if ($this->sessions->removeElement($session)) {
            // set the owning side to null (unless already changed)
            if ($session->getUtilisateur() === $this) {
                $session->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Vpn[]
     */
    public function getVpns(): Collection
    {
        return $this->vpns;
    }

    public function addVpn(Vpn $vpn): self
    {
        if (!$this->vpns->contains($vpn)) {
            $this->vpns[] = $vpn;
            $vpn->setUtilisateur($this);
        }

        return $this;
    }

    public function removeVpn(Vpn $vpn): self
    {
        if ($this->vpns->removeElement($vpn)) {
            // set the owning side to null (unless already changed)
            if ($vpn->getUtilisateur() === $this) {
                $vpn->setUtilisateur(null);
            }
        }

        return $this;
    }

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): self
    {
        $this->service = $service;

        return $this;
    }

    /**
     * @return Collection|Courrier[]
     */
    public function getCourriers(): Collection
    {
        return $this->courriers;
    }

    public function addCourrier(Courrier $courrier): self
    {
        if (!$this->courriers->contains($courrier)) {
            $this->courriers[] = $courrier;
            $courrier->setUtilisateur($this);
        }

        return $this;
    }

    public function removeCourrier(Courrier $courrier): self
    {
        if ($this->courriers->removeElement($courrier)) {
            // set the owning side to null (unless already changed)
            if ($courrier->getUtilisateur() === $this) {
                $courrier->setUtilisateur(null);
            }
        }

        return $this;
    }
}
