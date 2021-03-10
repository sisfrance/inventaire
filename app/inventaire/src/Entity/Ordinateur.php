<?php

namespace App\Entity;

use App\Repository\OrdinateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrdinateurRepository::class)
 */
class Ordinateur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="Id",type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $reference;

    /**
     * @ORM\ManyToOne(targetEntity=Modele::class, inversedBy="ordinateurs")
     * @ORM\JoinColumn(name="modele_id", referencedColumnName="Id")
     */
    private $modele;

    /**
     * @ORM\ManyToOne(targetEntity=TypeOrdinateur::class, inversedBy="ordinateurs")
     * @ORM\JoinColumn(name="typeordinateur_id", referencedColumnName="Id")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Processeur::class, inversedBy="ordinateurs")
     * @ORM\JoinColumn(name="processeur_id", referencedColumnName="Id")
     */
    private $processeur;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $ram;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_achat;

    /**
     * @ORM\ManyToOne(targetEntity=Fournisseur::class, inversedBy="ordinateurs")
     * @ORM\JoinColumn(name="id", referencedColumnName="Id")
     */
    private $fournisseur;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $ipadresse;

    /**
     * @ORM\ManyToOne(targetEntity=Os::class, inversedBy="ordinateurs")
     * @ORM\JoinColumn(name="os_id", referencedColumnName="Id")
     */
    private $os;

    /**
     * @ORM\ManyToOne(targetEntity=Emplacement::class, inversedBy="ordinateurs")
     * @ORM\JoinColumn(name="emplacement_id", referencedColumnName="Id")
     */
    private $emplacement;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $notes;

    /**
     * @ORM\ManyToMany(targetEntity=Peripherique::class, inversedBy="ordinateurs")
     * 
     */
    private $peripheriques;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $serialnumber;

    /**
     * @ORM\OneToMany(targetEntity=PosteDeTravail::class, mappedBy="ordinateur")
     */
    private $posteDeTravails;

    /**
     * @ORM\OneToMany(targetEntity=Office::class, mappedBy="ordinateur")
     */
    private $offices;

    /**
     * @ORM\OneToMany(targetEntity=LecteurReseau::class, mappedBy="ordinateur")
     */
    private $yes;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $nom_pc;

    public function __construct()
    {
        $this->peripheriques = new ArrayCollection();
        $this->posteDeTravails = new ArrayCollection();
        $this->offices = new ArrayCollection();
        $this->yes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getType(): ?TypeOrdinateur
    {
        return $this->type;
    }

    public function setType(?TypeOrdinateur $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getProcesseur(): ?Processeur
    {
        return $this->processeur;
    }

    public function setProcesseur(?Processeur $processeur): self
    {
        $this->processeur = $processeur;

        return $this;
    }

    public function getRam(): ?string
    {
        return $this->ram;
    }

    public function setRam(?string $ram): self
    {
        $this->ram = $ram;

        return $this;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->date_achat;
    }

    public function setDateAchat(?\DateTimeInterface $date_achat): self
    {
        $this->date_achat = $date_achat;

        return $this;
    }

    public function getFournisseur(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Fournisseur $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getIpadresse(): ?string
    {
        return $this->ipadresse;
    }

    public function setIpadresse(?string $ipadresse): self
    {
        $this->ipadresse = $ipadresse;

        return $this;
    }

    public function getOs(): ?Os
    {
        return $this->os;
    }

    public function setOs(?Os $os): self
    {
        $this->os = $os;

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

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * @return Collection|Peripherique[]
     */
    public function getPeripheriques(): Collection
    {
        return $this->peripheriques;
    }

    public function addPeripherique(Peripherique $peripherique): self
    {
        if (!$this->peripheriques->contains($peripherique)) {
            $this->peripheriques[] = $peripherique;
        }

        return $this;
    }

    public function removePeripherique(Peripherique $peripherique): self
    {
        $this->peripheriques->removeElement($peripherique);

        return $this;
    }

    public function getSerialnumber(): ?string
    {
        return $this->serialnumber;
    }

    public function setSerialnumber(?string $serialnumber): self
    {
        $this->serialnumber = $serialnumber;

        return $this;
    }

    /**
     * @return Collection|PosteDeTravail[]
     */
    public function getPosteDeTravails(): Collection
    {
        return $this->posteDeTravails;
    }

    public function addPosteDeTravail(PosteDeTravail $posteDeTravail): self
    {
        if (!$this->posteDeTravails->contains($posteDeTravail)) {
            $this->posteDeTravails[] = $posteDeTravail;
            $posteDeTravail->setOrdinateur($this);
        }

        return $this;
    }

    public function removePosteDeTravail(PosteDeTravail $posteDeTravail): self
    {
        if ($this->posteDeTravails->removeElement($posteDeTravail)) {
            // set the owning side to null (unless already changed)
            if ($posteDeTravail->getOrdinateur() === $this) {
                $posteDeTravail->setOrdinateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Office[]
     */
    public function getOffices(): Collection
    {
        return $this->offices;
    }

    public function addOffice(Office $office): self
    {
        if (!$this->offices->contains($office)) {
            $this->offices[] = $office;
            $office->setOrdinateur($this);
        }

        return $this;
    }

    public function removeOffice(Office $office): self
    {
        if ($this->offices->removeElement($office)) {
            // set the owning side to null (unless already changed)
            if ($office->getOrdinateur() === $this) {
                $office->setOrdinateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|LecteurReseau[]
     */
    public function getYes(): Collection
    {
        return $this->yes;
    }

    public function addYe(LecteurReseau $ye): self
    {
        if (!$this->yes->contains($ye)) {
            $this->yes[] = $ye;
            $ye->setOrdinateur($this);
        }

        return $this;
    }

    public function removeYe(LecteurReseau $ye): self
    {
        if ($this->yes->removeElement($ye)) {
            // set the owning side to null (unless already changed)
            if ($ye->getOrdinateur() === $this) {
                $ye->setOrdinateur(null);
            }
        }

        return $this;
    }

    public function getNomPc(): ?string
    {
        return $this->nom_pc;
    }

    public function setNomPc(?string $nom_pc): self
    {
        $this->nom_pc = $nom_pc;

        return $this;
    }
}
