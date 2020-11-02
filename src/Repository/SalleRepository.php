<?php

namespace App\Repository;

use App\Entity\Salle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Salle|null find($id, $lockMode = null, $lockVersion = null)
 * @method Salle|null findOneBy(array $criteria, array $orderBy = null)
 * @method Salle[]    findAll()
 * @method Salle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SalleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Salle::class);
    }

     /**
      * @return Salle[] Returns an array of Salle objects
      */
    
      public function findByIndisponible($maxppl, $datestart, $dateend)
      {

        $subQb = $this->getEntitymanager()->createQueryBuilder();

        $subQ = $this->createQueryBuilder('s')
        ->leftJoin('s.reservations', 'p')
        ->andWhere('p.dateStart > :valstart')
        ->andWhere('p.dateStart < :valend')
        ->setParameter('valstart', $datestart)
        ->setParameter('valend', $dateend); 

        $fdqs = $this->createQueryBuilder('c')
          ->where($subQb->expr()->notIn('c.id', $subQ->getDQL()))
          ->andWhere('c.bookable = :bookable')
          ->andWhere('c.personsMax >= :personsMax')
          ->setParameter('valstart', $datestart)
        ->setParameter('valend', $dateend)
          ->setParameter('personsMax', $maxppl)
         ->setParameter('bookable', true)
          ->getQuery()
          ->getResult()
        ;
  
          return $fdqs;
      }

    

    
    public function findByBookable($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.bookable = :val')
            ->setParameter('val', $value)
            // ->getQuery()
            // ->execute()
            // ->getResult()
        ;
    }


    
}
