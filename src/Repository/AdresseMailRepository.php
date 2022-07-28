<?php

namespace App\Repository;

use App\Entity\AdresseMail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AdresseMail|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdresseMail|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdresseMail[]    findAll()
 * @method AdresseMail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdresseMailRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdresseMail::class);
    }

    // /**
    //  * @return AdresseMail[] Returns an array of AdresseMail objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AdresseMail
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
