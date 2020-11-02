<?php

namespace App\Repository;

use App\Entity\Reservation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Expr\Value;
use Doctrine\Persistence\ManagerRegistry;


/**
 * @method Reservation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reservation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reservation[]    findAll()
 * @method Reservation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReservationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reservation::class);
    }

//  value3 = date avec 2 varuiable , date debut et date de fin 
// where date dezbut inférieux , et date fin supérieux

    public function findResa($value2, $value3, $value4)
    {

        return $this->createQueryBuilder('s')
            // ->leftJoin('s.user', 'p')
            // ->andWhere('p.userGroup = :val')
            ->andWhere('s.salle = :valbis')
            ->andWhere('s.dateStart > :valstart')
            ->andWhere('s.dateStart < :valend')
            // ->setParameter('val', $value)
            ->setParameter('valbis', $value2)
            ->setParameter('valstart', $value3)
            ->setParameter('valend', $value4)
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return Reservation[] Returns an array of Reservation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Reservation
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
