<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        if (Crud::PAGE_INDEX === $pageName) 
        {
            return [
                TextField::new('firstName' , 'Prénom'),
                TextField::new('lastName', 'Nom de famille'),
                TextField::new('adress', 'Adresse'),
                EmailField::new('email', 'Adresse Email'),
            ];
        }
        return [
            TextField::new('firstName', 'Prénom'),
            TextField::new('lastName', 'Nom de famille'),
            TextField::new('adress', 'Adresse'),
            NumberField::new('postalCode', 'Code Postal'),
            TextField::new('town', 'Ville'),
            EmailField::new('email', 'Adresse Email'),
            
            // pas de reservation depuis creation user. probleme de mot de passe confidentialité
            
        ];
    }
}
