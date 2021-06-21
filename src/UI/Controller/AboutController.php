<?php

namespace App\UI\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class AboutController
{
    #[Route(path: '/about', name: 'app_about')]
    public function __invoke(Environment $twig): Response
    {
        return new Response($twig->render('ui/about/index.html.twig'));
    }
}