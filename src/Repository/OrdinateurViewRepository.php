<?php

namespace App\Repository;

use App\Entity\OrdinateurView;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OrdinateurView|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrdinateurView|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrdinateurView[]    findAll()
 * @method OrdinateurView[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrdinateurViewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrdinateurView::class);
    }

    // /**
    //  * @return OrdinateurView[] Returns an array of OrdinateurView objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OrdinateurView
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function getByType(): ?string
	{
		return "coucou";
	}
}
