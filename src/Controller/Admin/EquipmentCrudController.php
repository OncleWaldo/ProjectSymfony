<?php

namespace App\Controller\Admin;

use App\Entity\Equipment;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EquipmentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Equipment::class;
    }

    public function configureFields(string $pageName): iterable
    {
        if (Crud::PAGE_INDEX === $pageName) 
        {
            return [
                TextField::new('name', 'Nom'),
                NumberField::new('quantity', 'Quantité'),
                TextField::new('state', 'Etat général'),
                TextField::new('reference', 'Référence de l\'équipement')
          
                
            ];
        }
        return [
            TextField::new('name', 'Nom'),
            NumberField::new('quantity', 'Quantité'),
            TextField::new('state', 'Etat général'),
            TextField::new('reference', 'Référence de l\'équipement')
            
      
        ];
    }
}
