<?php

namespace App\Controller\Admin;

use App\Entity\Mundo;
use App\Entity\News;
use App\Entity\Category;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // redirect to some CRUD controller
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();

        return $this->redirect($routeBuilder->setController(NewsCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('TV Cabinda');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Painel de controle', 'fa fa-home');
        yield MenuItem::linkToCrud('Usuarios', 'fas fa-users', User::class);
        yield MenuItem::linkToCrud('Categorias', 'fas fa-list', Category::class);
        yield MenuItem::linkToCrud('Mundo', 'fas fa-list', Mundo::class);
        yield MenuItem::linkToCrud('Notícias', 'fas fa-newspaper', News::class);
    }
}
