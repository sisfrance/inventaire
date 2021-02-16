<?php

namespace App\Controller\Admin;
use App\Entity\Fonction;
use App\Entity\Utilisateur;
use App\Entity\Marque;
use App\Entity\Modele;
use App\Entity\Emplacement;
use App\Entity\Os;
use App\Entity\Processeur;
use App\Entity\Telephone;
use App\Entity\TypeOrdinateur;
use App\Entity\TypePeripherique;
use App\Entity\Peripherique;
use App\Entity\Ordinateur;
use App\Entity\Client;
use App\Entity\LecteurReseau;
use App\Entity\Office;
use App\Entity\PosteDeTravail;
use App\Entity\Service;
use App\Entity\Session;
use App\Entity\VersionOffice;
use App\Entity\Vpn;
use App\Entity\Site;
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
            ->setTitle('Inventaire');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::linkToCrud('Clients','fa fa-tags',Client::class);
        yield MenuItem::linkToCrud('Lecteurs réseaux','fa fa-tags',LecteurReseau::class);
        yield MenuItem::linkToCrud('Offices','fa fa-tags',Office::class);
        yield MenuItem::linkToCrud('Postes de Travails','fa fa-tags',PosteDeTravail::class);
        yield MenuItem::linkToCrud('Services','fa fa-tags',Service::class);
        yield MenuItem::linkToCrud('Sessions','fa fa-tags',Session::class);
        yield MenuItem::linkToCrud('Versions Offices','fa fa-tags',VersionOffice::class);
        yield MenuItem::linkToCrud('Vpns','fa fa-tags',Vpn::class);
        yield MenuItem::linkToCrud('Utilisateurs','fa fa-tags',Utilisateur::class);
        yield MenuItem::linkToCrud('Fonctions','fa fa-tags',Fonction::class);
        yield MenuItem::LinkToCrud('Modeles','fa fa-tags',Modele::class);
        yield MenuItem::LinkToCrud('Marques','fa fa-tags',Marque::class);
        yield MenuItem::LinkToCrud('Emplacements','fa fa-tags',Emplacement::class);
        yield MenuItem::LinkToCrud('Os','fa fa-tags',Os::class);
        yield MenuItem::LinkToCrud('Processeurs','fa fa-tags',Processeur::class);
        yield MenuItem::LinkToCrud('Telephones','fa fa-tags',Telephone::class);
        yield MenuItem::LinkToCrud('Types Ordinateurs','fa fa-tags',TypeOrdinateur::class);
        yield MenuItem::LinkToCrud('Types Peripheriques','fa fa-tags',TypePeripherique::class);
        yield MenuItem::LinkToCrud('Peripheriques','fa fa-tags',Peripherique::class);
        yield MenuItem::LinkToCrud('Ordinateurs','fa fa-tags',Ordinateur::class);
        yield MenuItem::LinkToCrud('Sites','fa fa-tags',Site::class);
        yield MenuItem::LinkToCrud('Lecteurs réseaux','fa fa-tags',LecteurReseau::class);
        
    }
    
}
