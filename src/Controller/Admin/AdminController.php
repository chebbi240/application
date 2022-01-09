<?php

namespace App\Controller\Admin;
use App\Repository\CamionRepository;
use App\Entity\Camion;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator ;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractDashboardController
{
    /**
     * @Route("/admin/easy", name="admin")
     */
    
          
    
    
    public function index():Response{
        return $this->render('admin/dashboard.html.twig');
    
    }
    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
             ->setTitle('m2transport');
    }
    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard','fa fa-home'),
            MenuItem::section('camion'),
            MenuItem::linkToCrud('camion','fa-fa-matricule',camion::class),
        ];

    }
    // public function configureDashboard(): Dashboard
    // {
    //     return Dashboard::new()
    //         ->setTitle('M2transport');
    // }

    // public function configureMenuItems(): iterable
    // {
        // yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    // }
}
