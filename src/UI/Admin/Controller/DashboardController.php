<?php

namespace App\UI\Admin\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class DashboardController
{
    private Environment $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    #[Route(path: '/', name: 'dashboard')]
    public function __invoke(): Response
    {
        return new Response($this->twig->render('admin/dashboard/index.html.twig'));
    }
}