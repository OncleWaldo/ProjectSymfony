<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use app\Entity\Equipment;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class EquipmentFixtures extends Fixture 
{
    public function load(ObjectManager $manager)
    {
            $equipment = new Equipment();
            $equipment->setName("Chaise")
                 ->setQuantity("12")
                 ->setState("Bon état")
                 ->setReference("gouidg54545");
                 $this->addReference("Chaise", $equipment);
            $manager->persist($equipment);

            $equipment = new Equipment();
            $equipment->setName("Cafetière Senseo")
                 ->setQuantity("1")
                 ->setState("Bon état")
                 ->setReference("gfsvxvcfsd5");
                 $this->addReference("Cafetière Senseo", $equipment);
            $manager->persist($equipment);
            
            $equipment = new Equipment();
            $equipment->setName("Ping Pong")
                 ->setQuantity("1")
                 ->setState("Bon état")
                 ->setReference("ggfpomsd5");
                 $this->addReference("Ping Pong", $equipment);
            $manager->persist($equipment);

            $equipment = new Equipment();
            $equipment->setName("Table")
                 ->setQuantity(8)
                 ->setState("état moyen")
                 ->setReference("2454gfdgd");
                 $this->addReference("Table", $equipment);
            $manager->persist($equipment);
            

            $equipment = new Equipment();
            $equipment->setName("Imprimante")
                 ->setQuantity("2")
                 ->setState("mauvaise état")
                 ->setReference("gfd5464");
                 $this->addReference("Imprimante", $equipment);
            $manager->persist($equipment);
            

        $manager->flush();
    }

    // public function getDependencies()
    // {
    //     return array(
           
    //     );
    // }
    
}