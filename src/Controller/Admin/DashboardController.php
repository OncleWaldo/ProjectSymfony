<?php

namespace App\Controller\Admin;

use App\Entity\CategorySalle;
use App\Entity\Salle;
use App\Entity\Equipment;
use App\Entity\Reservation;
use App\Entity\Status;
use App\Entity\User;
use App\Entity\UserGroup;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/administration", name="administration")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Villebergerac');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

            MenuItem::section('Salles'),
            MenuItem::linkToCrud('Catégories de salle', 'fa fa-tags', CategorySalle::class),
            MenuItem::linkToCrud('Salles', 'fa fa-tags', Salle::class),
            MenuItem::linkToCrud('Equipements des salles', 'fa fa-tags', Equipment::class),

            MenuItem::section('Utilisateurs'),
            MenuItem::linkToCrud('Utilisateurs', 'fa fa-tags', User::class),
            MenuItem::linkToCrud('Groupe des utilisateurs', 'fa fa-tags', UserGroup::class),

            MenuItem::section('Réservations'),
            MenuItem::linkToCrud('Les réservations', 'fa fa-tags', Reservation::class),
            MenuItem::linkToCrud('Status des réservations', 'fa fa-tags', Status::class),
            
        ];
    }
    public function configureCrud(): Crud
    {
        return Crud::new();
        
    }
}
