<?php

namespace App\UI\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HomeController
{
    #[Route(path: '/', name: 'app_home')]
    public function __invoke(Environment $twig): Response
    {
        return new Response($twig->render('home/index.html.twig'));
    }
}