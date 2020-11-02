<?php

namespace App\Controller\Admin;

use App\Entity\CategorySalle;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;


class CategorySalleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CategorySalle::class;
    }

    public function configureFields(string $pageName): iterable
    {
        if (Crud::PAGE_INDEX === $pageName) {
            return [
                TextField::new('name', 'Nom'), 
            ];
        }
        return [
            TextField::new('name', 'Nom'),
        ];
    }
}
