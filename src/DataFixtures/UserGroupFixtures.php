<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use app\Entity\UserGroup;

class UserGroupFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $usergroup = new UserGroup();
        $usergroup->setName("Association");
        $manager->persist($usergroup);
        $this->addReference("Association", $usergroup);   

        $usergroup = new UserGroup();
        $usergroup->setName("Particulier");
        $manager->persist($usergroup);
        $this->addReference("Particulier", $usergroup);   

        $usergroup = new UserGroup();
        $usergroup->setName("Entreprise");
        $manager->persist($usergroup);
        $this->addReference("Entreprise", $usergroup);   
        $manager->flush(); 
    }
}
