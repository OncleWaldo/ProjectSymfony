<?php

namespace App\Form;

use App\Entity\UserGroup;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

use Doctrine\ORM\EntityManagerInterface;

class SalleMaxType extends AbstractType
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('etes_vous', EntityType::class,[
                    "class" =>  UserGroup::class,
                    'choice_label' => 'name',
                    'expanded' => true,
                ])
                ->add('Personnes_Max', IntegerType::class)     
                ->add('dates' , Datetype::class)  
                    
        ;
    }
}