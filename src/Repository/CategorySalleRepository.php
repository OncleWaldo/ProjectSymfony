<?php

namespace App\Repository;

use App\Entity\CategorySalle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategorySalle|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorySalle|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorySalle[]    findAll()
 * @method CategorySalle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorySalleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorySalle::class);
    }

    // /**
    //  * @return CategorySalle[] Returns an array of CategorySalle objects
    //  */
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
    public function findOneBySomeField($value): ?CategorySalle
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
