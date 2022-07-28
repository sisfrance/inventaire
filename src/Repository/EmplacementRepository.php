<?php

namespace App\Repository;

use App\Entity\Emplacement;
use App\Entity\Site;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Emplacement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Emplacement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Emplacement[]    findAll()
 * @method Emplacement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmplacementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Emplacement::class);
    }
    
	public function getEmplacementFromClients(array $ids): Array
	{
		$subquery=$this->createQueryBuilder('e');
		$subquery->select('e.id')
				->leftJoin('e.site','s')
				->add('where',$subquery->expr()->in('s.client', '?1'))
				->setParameter(1,$ids); 

		$result=$subquery->getQuery()->getResult();
		$fetch_id_function = function($elt){ return $elt['id'];};
		
		return array_map($fetch_id_function,$result);
	}
    // /**
    //  * @return Emplacement[] Returns an array of Emplacement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Emplacement
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
