<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use App\Entity\Salle;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SalleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Salle::class;
    }


    
    public function configureFields(string $pageName): iterable
    {
        if (Crud::PAGE_INDEX === $pageName) {
            return [
                TextField::new('name', 'Nom'),
                AssociationField::new('category', 'Type de salle'),
                CollectionField::new('thePrices', 'Prix')
                
            ];
        }
        return [
            TextField::new('name', 'Nom'),
            TextField::new('adress', 'Adresse'),
            NumberField::new('personsMax', 'Nombre maximum de personne'),
            BooleanField::new('bookable', 'La salle est-elle réservable ?'),
            CollectionField::new('thePrices', 'Prix')
            ->setFormTypeOptions(['entry_type' => \App\Form\ThePriceType::class, 'by_reference'  => false]),
            AssociationField::new('category', 'Quel type de salle'),
            CollectionField::new('equipments', 'Quel équipements disponible dans la salle ')
            ->setFormTypeOptions(['entry_type' => \App\Form\EquipmentType::class, 'by_reference'  => false]),
        ];
    }
    
}
