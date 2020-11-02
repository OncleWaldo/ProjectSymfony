<?php

namespace App\Form;

use App\Entity\UserGroup;
use App\Entity\Salle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormBuilderInterface;

class ReservationType extends AbstractType
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
                ->add('Personnes_max', EntityType::class,[
                    "class" =>  Salle::class,
                    'choice_label' => 'name',
                    'query_builder' => $this->entityManager->getRepository(Salle::class)->findByBookable(true),
                ])
                ->add('dates' , Datetype::class)  
                    
        ;
    }
}






