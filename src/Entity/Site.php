<?php

namespace App\Entity;

use App\Repository\SiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SiteRepository::class)
 */
class Site
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
    private $site;

    /**
     * @ORM\Column(type="string", length=150,nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $code_postal;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="sites")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $ville;

    /**
     * @ORM\OneToMany(targetEntity=Emplacement::class, mappedBy="site")
     */
    private $emplacements;

    public function __construct()
    {
        $this->emplacements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSite(): ?string
    {
        return $this->site;
    }

    public function setSite(string $site): self
    {
        $this->site = $site;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(?string $code_postal): self
    {
        $this->code_postal = $code_postal;

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

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * @return Collection|Emplacement[]
     */
    public function getEmplacements(): Collection
    {
        return $this->emplacements;
    }

    public function addEmplacement(Emplacement $emplacement): self
    {
        if (!$this->emplacements->contains($emplacement)) {
            $this->emplacements[] = $emplacement;
            $emplacement->setSite($this);
        }

        return $this;
    }

    public function removeEmplacement(Emplacement $emplacement): self
    {
        if ($this->emplacements->removeElement($emplacement)) {
            // set the owning side to null (unless already changed)
            if ($emplacement->getSite() === $this) {
                $emplacement->setSite(null);
            }
        }

        return $this;
    }
}
