<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use app\Entity\ThePrice;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class ThePriceFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager) 
    {
        $price = new ThePrice();
        $price->setAmountBergerac(250)
              ->setAmountHorsBergerac(350)
              ->setUserGroup($this->getReference("Association"));
            //   ->setAmount(500);
        $manager->persist($price);
 

        $price = new ThePrice();
        $price->setAmountBergerac(500)
              ->setAmountHorsBergerac(650)
              ->setUserGroup($this->getReference("Association"));
            //   ->setAmount(500);
        $manager->persist($price);

        $price = new ThePrice();
        $price->setAmountBergerac(600)
              ->setAmountHorsBergerac(800)
              ->setUserGroup($this->getReference("Association"));
            //   ->setAmount(500);
        $manager->persist($price);
        $manager->flush(); 
    }
    public function getDependencies()
    {
        return array(
            UserGroupFixtures::class,
        );
    }
}
