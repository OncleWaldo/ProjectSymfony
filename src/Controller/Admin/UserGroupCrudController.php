<?php

namespace App\Controller\Admin;

use App\Entity\UserGroup;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;


class UserGroupCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return UserGroup::class;
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
