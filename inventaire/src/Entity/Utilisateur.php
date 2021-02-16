<?php
namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="utilisateur")
 */
 
 class Utilisateur
{
/**
 * @var integer
 * @ORM\Id
 * @ORM\GeneratedValue(strategy="AUTO")
 * @ORM\Column(name="Id", type="integer")
 */	 
 private $id;
 
 /**
 * @var ?string
 * @ORM\Column(name="nom",type="string")
 */
 
private $nom;
 
 /**
  * @var ?string
  * @ORM\Column(name="prenom",type="string")
  */
  
  private $prenom;
  
  /**
   * @ORM\ManyToOne(
   *              targetEntity="App\Entity\Fonction",
   *              inversedBy="utilisateurs"
   *              )
   * @ORM\JoinColumn(name="fonction_id", referencedColumnName="Id")
   */
   
   private $fonction;

   /**
	* @ORM\ManyToOne(targetEntity=PosteDeTravail::class, inversedBy="utilisateurs")
	*/
   private $postedetravail;

   /**
	* @ORM\ManyToOne(targetEntity=Service::class, inversedBy="utilisateurs")
	*/
   private $service;

   /**
	* @ORM\ManyToMany(targetEntity=Session::class, mappedBy="utilisateur")
	*/
   private $sessions;

   /**
	* @ORM\OneToMany(targetEntity=Vpn::class, mappedBy="utilisateur")
	*/
   private $vpns;

   public function __construct()
   {
	   $this->sessions = new ArrayCollection();
	   $this->vpns = new ArrayCollection();
   }


   
   /** @return int|null */
   public function getId(): ?int{
	return $this->id; 
 }
 /** @param int */
 public function setId(int $id): void{
	$this->id=$id;
 }
   /** @return string|null  */
 public function getNom(): ?string{
	return $this->nom;
 }
 /** @param string|null */
 public function setNom(?string $nom): void{
	$this->nom=$nom; 
 }
 /** @return string|null */
 public function getPrenom(): ?string{
	 return $this->prenom;
 }
 /** @return string|null */
 public function setPrenom(string $prenom): void{
	$this->prenom=$prenom; 
 }
 /** return Fonction|null */
 public function getFonction(): ?Fonction{
	return $this->fonction; 
 }
 /** @param Fonction|null */
 public function setFonction(?Fonction  $fonction): self{
	echo $fonction;
	$this->fonction=$fonction;
	return $this; 
 }

public function getPostedetravail(): ?PosteDeTravail
{
	return $this->postedetravail;
}

public function setPostedetravail(?PosteDeTravail $postedetravail): self
{
	$this->postedetravail = $postedetravail;

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
		$session->addUtilisateur($this);
	}

	return $this;
}

public function removeSession(Session $session): self
{
	if ($this->sessions->removeElement($session)) {
		$session->removeUtilisateur($this);
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

}


?>
