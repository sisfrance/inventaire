<?php

namespace App\Repository;

use App\Entity\TypePeripherique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypePeripherique|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypePeripherique|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypePeripherique[]    findAll()
 * @method TypePeripherique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypePeripheriqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypePeripherique::class);
    }

    // /**
    //  * @return TypePeripherique[] Returns an array of TypePeripherique objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypePeripherique
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
