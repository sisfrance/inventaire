<?php

namespace App\Repository;

use App\Entity\Client;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @method Client|null find($id, $lockMode = null, $lockVersion = null)
 * @method Client|null findOneBy(array $criteria, array $orderBy = null)
 * @method Client[]    findAll()
 * @method Client[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Client::class);
    }

    // /**
    //  * @return Client[] Returns an array of Client objects
    //  */
   
    public function getOrdinateurs($ids)
    {
		$clients=$this->findBy(array('id'=>$ids));
		$ordinateurs=[];
		foreach($clients as $client)
		{
			$sites=$client->getSites();
			
			foreach($sites as $site)
			{
				$emplacements=$site->getEmplacements()->toArray();
				
				foreach($emplacements as $emplacement)
				{
					$ordinateurs=array_merge($ordinateurs,(array) $emplacement->getOrdinateurs()->toArray());
				}
			}
		}
		return new ArrayCollection($ordinateurs);
		
	}
    
    public function getSites($ids)
    {
			$clients=$this->findBy(array('id'=>$ids));
			$sites=[];
		
			foreach($clients as $client)
			{
				$sites=array_merge($sites,(array) $client->getSites()->toArray());
				
			}
		return new ArrayCollection($sites);
	}
	
	public function getUtilisateurs($ids)
	{
		$clients=$this->findBy(array('id'=>$ids));
		$utilisateurs=[];
		foreach($clients as $client)
		{
				foreach($client->getSites() as $site)
				{
					foreach($site->getEmplacements() as $emplacement)
					{
							$utilisateurs=array_merge($utilisateurs, (array) $emplacement->getUtilisateurs(array('nom'=>'ASC'))->toArray());
					}
				}
		}
		return new ArrayCollection($utilisateurs);
	}
    /*
    
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Client
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
