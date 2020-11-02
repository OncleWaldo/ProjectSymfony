<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use app\Entity\Salle;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class SalleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager) 
    {
        $salle = new Salle();
        $salle->setName("Salle 3")
               ->setAdress("12 boulevard du petit change")
               ->setDescription("La salle 3 elle déglingue")
               ->setPersonsMax(50)
               ->setBookable(0) 
               ->addEquipment($this->getReference("Table"))
            //    ->addThePrices($this->getReference(250))
               ->setCategory($this->getReference("Parking")); 
        $manager->persist($salle);
        $this->addReference("Salle 3", $salle);   

        $salle = new Salle();
        $salle->setName("Salle 10")
               ->setAdress("45 rue des popos")
               ->setDescription("La salle 10 elle déglingue")
               ->setPersonsMax(150)
               ->addEquipment($this->getReference("Ping Pong"))
               ->addEquipment($this->getReference("Cafetière Senseo"))
               ->setBookable(1)
               ->setCategory($this->getReference("Parking")); 
        $manager->persist($salle);
        $this->addReference("Salle 10", $salle);  

        $salle = new Salle();
        $salle->setName("Salle 12")
              ->setAdress("45 rue Limogeanne")
              ->setPersonsMax(150)
              ->setBookable(1)
              ->addEquipment($this->getReference("Chaise"))
              ->setCategory($this->getReference("Bureau")); 
        $manager->persist($salle);
        $this->addReference("Salle 12", $salle);   

        $salle = new Salle();
        $salle->setName("Salle 25")
              ->setAdress("3 rue des prés")
              ->setDescription("La salle 25 elle est claquée")
              ->setPersonsMax(400)
              ->setBookable(0)
              ->addEquipment($this->getReference("Imprimante"))
              ->setCategory($this->getReference("Salle de sport")); 
        $manager->persist($salle);
        $this->addReference("Salle 25", $salle);   
        $manager->flush(); 
    }
    public function getDependencies()
    {
        return array(
            CategorySalleFixtures::class,
            EquipmentFixtures::class,
        );
    }
}
