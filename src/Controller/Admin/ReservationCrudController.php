<?php

namespace App\Controller\Admin;

use App\Entity\Reservation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use App\Entity\Salle;


class ReservationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reservation::class;
    }

    
    // public function configureFields(string $pageName): iterable
    // {
    //     if (Crud::PAGE_INDEX === $pageName) {
    //         return [
    //             IdField::new('id'),
    //             TextField::new('title'),
    //             TextEditorField::new('description'),
    //         ];
    //     }
    //     return [
    //         TextField::new('name', 'Nom'),
    //         TextField::new('adress', 'Adresse'),
    //         NumberField::new('personsMax', 'Nombre maximum de personne'),
    //         BooleanField::new('bookable', 'La salle est-elle réservable ?'),
    //         CollectionField::new('thePrices', 'Prix')
    //         ->setFormTypeOptions(['entry_type' => \App\Form\ThePriceType::class, 'by_reference'  => false]),
    //         AssociationField::new('category', 'Quel type de salle'),
    //         CollectionField::new('equipments', 'Quel équipements disponible dans la salle ')
    //         ->setFormTypeOptions(['entry_type' => \App\Form\EquipmentType::class, 'by_reference'  => false]),
    
    //     ];   
    // }
}