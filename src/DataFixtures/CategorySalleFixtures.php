<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\CategorySalle;

class CategorySalleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $categorysalle = new CategorySalle();
        $categorysalle->setName("Parking");
        $manager->persist($categorysalle);
        $this->addReference("Parking", $categorysalle);   

        $categorysalle = new CategorySalle();
        $categorysalle->setName("Salle de sport");
        $manager->persist($categorysalle);
        $this->addReference("Salle de sport", $categorysalle);   

        $categorysalle = new CategorySalle();
        $categorysalle->setName("Bureau");
        $manager->persist($categorysalle);
        $this->addReference("Bureau", $categorysalle);   
        $manager->flush(); 
    } 
}
