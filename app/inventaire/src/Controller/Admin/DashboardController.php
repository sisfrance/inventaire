<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Client;
use App\Entity\Courrier;
use App\Entity\Emplacement;
use App\Entity\Fonction;
use App\Entity\Fournisseur;
use App\Entity\Marque;
use App\Entity\Modele;
use App\Entity\Office;
use App\Entity\Ordinateur;
use App\Entity\Peripherique;
use App\Entity\Processeur;
use App\Entity\Session;
use App\Entity\Site;
use App\Entity\Systeme;
use App\Entity\TypeOrdinateur;
use App\Entity\TypePeripherique;
use App\Entity\Utilisateur;
use App\Entity\Vpn;


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
            ->setTitle('Inventaire');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::linkToCrud('Client','fa fa-list',Client::class);
        yield MenuItem::linkToCrud('Comptes de Courrier','fa fa-list',Courrier::class);
        yield MenuItem::linkToCrud('Emplacement','fa fa-list',Emplacement::class);
        yield MenuItem::linkToCrud('Fonction','fa fa-list',Fonction::class);
        yield MenuItem::linkToCrud('Fournisseur','fa fa-list',Fournisseur::class);
        yield MenuItem::linkToCrud('Marque','fa fa-list',Marque::class);
        yield MenuItem::linkToCrud('Modele','fa fa-list',Modele::class);
        yield MenuItem::linkToCrud('Version Office','fa fa-list',Office::class);
        yield MenuItem::linkToCrud('Ordinateur','fa fa-list',Ordinateur::class);
        yield MenuItem::linkToCrud('Périphérique','fa fa-list',Peripherique::class);
        yield MenuItem::linkToCrud('Processeur','fa fa-list',Processeur::class);
        yield MenuItem::linkToCrud('Session','fa fa-list',Session::class);
        yield MenuItem::linkToCrud('Site','fa fa-list',Site::class);
        yield MenuItem::linkToCrud('Systeme','fa fa-list',Systeme::class);
        yield MenuItem::linkToCrud('TypeOrdinateur','fa fa-list',TypeOrdinateur::class);
        yield MenuItem::linkToCrud('TypePeripherique','fa fa-list',TypePeripherique::class);
        yield MenuItem::linkToCrud('Utilisateur','fa fa-list',Utilisateur::class);
        yield MenuItem::linkToCrud('Vpn','fa fa-list',Vpn::class);
    }
}
