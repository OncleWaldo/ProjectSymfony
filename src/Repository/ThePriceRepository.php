<?php

namespace App\Repository;

use App\Entity\ThePrice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ThePrice|null find($id, $lockMode = null, $lockVersion = null)
 * @method ThePrice|null findOneBy(array $criteria, array $orderBy = null)
 * @method ThePrice[]    findAll()
 * @method ThePrice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ThePriceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ThePrice::class);
    }

    // /**
    //  * @return ThePrice[] Returns an array of ThePrice objects
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
    public function findOneBySomeField($value): ?ThePrice
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
