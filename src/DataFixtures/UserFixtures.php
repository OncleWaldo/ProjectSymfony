<?php

namespace App\DataFixtures;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use app\Entity\User;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
         private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
         $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
            $user = new User();
            $user->setfirstName("Jean")
                 ->setPassword($this->passwordEncoder->encodePassword($user,'admin'))
                 ->setEmail("admin@email.fr")
                 ->setLastName("BonBeurre")
                 ->setAdress("12 rue des rossignols")
                 ->setpostalCode(75000)
                 ->setTown("Paris")
                 ->setUserGroup($this->getReference("Association"))
                 ->setRoles(["ROLE_ADMIN"]); 
            $manager->persist($user);
            $this->addReference("BonBeurre", $user); 
            

            $user = new User();
            $user->setfirstName("Victorine")
                 ->setPassword($this->passwordEncoder->encodePassword($user,'the_new_password'))
                 ->setEmail("Victorine@email.fr")
                 ->setLastName("Duchamps")
                 ->setAdress("43 rue des arbres")
                 ->setpostalCode(24100)
                 ->setTown("Bergerac")
                 ->setRoles(["ROLE_USER"])
                 ->setUserGroup($this->getReference("Entreprise")); 
            $manager->persist($user);
            $this->addReference("Duchamps", $user); 
            
            

            $user = new User();
            $user->setfirstName("Henrillette")
                 ->setPassword($this->passwordEncoder->encodePassword($user,'the_new_password'))
                 ->setEmail("Henrillette@email.fr")
                 ->setLastName("Cornichon")
                 ->setAdress("50 boulebard de la solidarité")
                 ->setpostalCode(2400)
                 ->setTown("Périgueux")
                 ->setRoles(["ROLE_USER"])
                 ->setUserGroup($this->getReference("Particulier"));   
            $manager->persist($user);
            $this->addReference("Cornichon", $user); 
            

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UserGroupFixtures::class,
        );
    }
    
}