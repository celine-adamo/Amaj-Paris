<?php

namespace App\Controller\Admin;

use App\Entity\Blaster;
use App\Entity\Changer;
use App\Entity\Creator;
use App\Entity\Iconics;
use App\Entity\Products;
use App\Entity\Sider;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Amaj Paris');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Tableau De Bord');
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        // Menu ajouté avec la commande => symfony console make:admin:crud
        yield MenuItem::section('Membres');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-users', User::class);
        yield MenuItem::section('Produits');
        yield MenuItem::linkToCrud('Icôniques', 'fas fa-pencil-ruler', Iconics::class);
        yield MenuItem::linkToCrud('Produits', 'fas fa-tshirt', Products::class);
        yield MenuItem::section('Produits Avec Icônique');
        yield MenuItem::linkToCrud('Blaster + Icôniques', 'fas fa-tshirt', Blaster::class);
        yield MenuItem::linkToCrud('Changer + Icôniques', 'fas fa-tshirt', Changer::class);
        yield MenuItem::linkToCrud('Creator + Icôniques', 'fas fa-tshirt', Creator::class);
        yield MenuItem::linkToCrud('Sider + Icôniques', 'fas fa-tshirt', Sider::class);
    }
}
