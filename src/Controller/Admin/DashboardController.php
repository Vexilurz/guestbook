<?php

namespace App\Controller\Admin;
use App\Entity\Comment;
use App\Entity\Conference;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('@EasyAdmin/page/content.html.twig');

//        $routeBuilder = $this->get(AdminUrlGenerator::class);
//        return $this->redirect($routeBuilder->setController(ConferenceCrudController::class)->generateUrl());

//        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Guestbook');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Home', 'fa fa-home', 'homepage');
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Conferences', 'fas fa-list', Conference::class);
        yield MenuItem::linkToCrud('Comments', 'fas fa-list', Comment::class);
    }
}
