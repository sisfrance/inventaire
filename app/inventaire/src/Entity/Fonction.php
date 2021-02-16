<?php
namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
/**
 * @ORM\Entity
 * @ORM\Table(name="fonction")
 */
 
 class Fonction
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
    * @ORM\Column(name="fonction",type="string")
    */
   
   private $fonction;
   
   /**
    * @ORM\OneToMany(targetEntity="App\Entity\Utilisateur",
    *                mappedBy="fonction")
    */
    
    private $utilisateurs;
    
    public function __construct()
    {
		$this->utilisateurs=new ArrayCollection();
	}
   /**
    * @return Collection\Utilisateur[]
    */
    public function getUtilisateurs(): Collection
    {
		return $this->utilisateurs;
	}
	
  /** @return int|null*/
  public function getId(): ?int{
	  return $this->id;
 }
 /** @param int */
 public function setID(int $id): void{
	$this->id=$id; 
 }
 /** @return string|null */
 public function getFonction(): ?string{
	return $this->fonction;
 }
 /** @param string|null */
 public function setFonction(?string $fonction): void{
	$this->fonction=$fonction; 
 }
 public function __toString(): ?string{
	return $this->getFonction(); 
 }
}
?>
