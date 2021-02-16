<?php

namespace App\Repository;

use App\Entity\VersionOffice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VersionOffice|null find($id, $lockMode = null, $lockVersion = null)
 * @method VersionOffice|null findOneBy(array $criteria, array $orderBy = null)
 * @method VersionOffice[]    findAll()
 * @method VersionOffice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VersionOfficeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VersionOffice::class);
    }

    // /**
    //  * @return VersionOffice[] Returns an array of VersionOffice objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VersionOffice
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
