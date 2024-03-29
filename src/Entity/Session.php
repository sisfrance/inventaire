<?php

namespace App\Entity;

use App\Repository\SessionRepository;
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
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $type_session;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $identifiant;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $mdp;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="sessions")
     */
    private $utilisateur;

    /**
     * @ORM\ManyToOne(targetEntity=TypeSession::class, inversedBy="sessions")
     */
    private $type_compte;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeSession(): ?string
    {
        return $this->type_session;
    }

    public function setTypeSession(?string $type_session): self
    {
        $this->type_session = $type_session;

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
	public function getHashMdp(): ?string
	{
		try{
			openssl_private_decrypt($this->mdp,$decrypted,"file://../config/keys/private.pem");
		}catch(Exception $e)
		{
			$decrypted=$this->mdp;
		}
		return md5($decrypted,$this->mdp);
		
	}
    public function getMdp(): ?string
    {
        try{
			openssl_private_decrypt($this->mdp,$decrypted,"file://../config/keys/private.pem");
			return $decrypted;
		}catch(Exception $e){
			
		return $this->mdp;	
		}
    }

    public function setMdp(?string $mdp): self
    {
         openssl_public_encrypt($mdp,$crypted,"file://../config/keys/public.pem");
         $this->mdp =$crypted;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getTypeCompte(): ?TypeSession
    {
        return $this->type_compte;
    }

    public function setTypeCompte(?TypeSession $type_compte): self
    {
        $this->type_compte = $type_compte;

        return $this;
    }
}
