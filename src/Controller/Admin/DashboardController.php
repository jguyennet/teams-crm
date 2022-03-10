<?php

namespace App\Controller\Admin;

use App\Entity\ExternalIndividualContact;
use App\Entity\LegalEntityContact;
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
            ->setTitle('Espace ADMINISTRATEUR');
    }

    public function configureMenuItems(): iterable
    {
        // yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToUrl('Espace utilisateur', 'fa fa-home', 'http://crm/account');
        yield MenuItem::linkToCrud('Contacts externes personnes morales', 'fas fa-list', LegalEntityContact::class);
        yield MenuItem::linkToCrud('Contacts externes personnes physiques', 'fas fa-list', ExternalIndividualContact::class);
        yield MenuItem::linkToUrl('Enregistrer un utilisateur', 'fas fa-list', 'http://crm/register');
    }
}
