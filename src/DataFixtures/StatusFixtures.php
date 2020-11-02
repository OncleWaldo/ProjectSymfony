<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use app\Entity\Status;


class StatusFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $status = new Status();
        $status->setName("En attente de validation")
               ->setColor("#ff0000");
        $manager->persist($status);
        $this->addReference("En attente de validation", $status);   

        $status = new Status();
        $status->setName("Validé")
               ->setColor("#000ff");
        $manager->persist($status);
        $this->addReference("Validé", $status);   

        $status = new Status();
        $status->setName("Non Validé")
               ->setColor("#c2049");  
        $manager->persist($status);
        $this->addReference("Non Validé", $status);   
        $manager->flush(); 
    }
}
