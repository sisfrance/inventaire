<?php

namespace App\Repository;

use App\Entity\Vpn;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Vpn|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vpn|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vpn[]    findAll()
 * @method Vpn[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VpnRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vpn::class);
    }

    // /**
    //  * @return Vpn[] Returns an array of Vpn objects
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
    public function findOneBySomeField($value): ?Vpn
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
