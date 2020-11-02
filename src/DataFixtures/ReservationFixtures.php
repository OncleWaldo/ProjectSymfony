<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use app\Entity\Reservation;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ReservationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager) 
    {
        $reservation = new Reservation();
        $reservation->setStatus($this->getReference("En attente de validation"))
                    ->setUser($this->getReference("BonBeurre"))
                    ->setSalle($this->getReference("Salle 3"))
                    ->setDateStart(new \DateTime('2020-10-13 08:00'))
                    ->setDateEnd(new \DateTime('2020-10-14 17:00'));
        $manager->persist($reservation);

        $reservation = new Reservation();
        $reservation->setStatus($this->getReference("En attente de validation"))
                    ->setUser($this->getReference("BonBeurre"))
                    ->setSalle($this->getReference("Salle 10"))
                    ->setDateStart(new \DateTime('2020-10-19 08:00'))
                    ->setDateEnd(new \DateTime('2020-10-20 17:00'));
        $manager->persist($reservation);


        $reservation = new Reservation();
        $reservation->setStatus($this->getReference("Validé"))
                    ->setUser($this->getReference("Duchamps"))
                    ->setSalle($this->getReference("Salle 12"))
                    ->setDateStart(new \DateTime('2020-11-01 08:00'))
                    ->setDateEnd(new \DateTime('2020-11-02 17:00'));
        $manager->persist($reservation);

        $reservation = new Reservation();
        $reservation->setStatus($this->getReference("Non Validé"))
                    ->setUser($this->getReference("Cornichon"))
                    ->setSalle($this->getReference("Salle 25"))
                    ->setDateStart(new \DateTime('2020-05-24 08:00'))
                    ->setDateEnd(new \DateTime('2020-05-26 17:00'));
        $manager->persist($reservation); 
        $manager->flush(); 
    }
    public function getDependencies()
    {
        return array(
            ThePriceFixtures::class,
            SalleFixtures::class,
            StatusFixtures::class,
            UserFixtures::class,
        );
    }
}
