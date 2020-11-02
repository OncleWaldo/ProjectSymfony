<?php

namespace App\Form;

use App\Entity\ThePrice;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ThePriceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('amountBergerac')
            ->add('amountHorsBergerac')
            ->add('userGroup')
            // ->add('salle')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ThePrice::class,
        ]);
    }
}
