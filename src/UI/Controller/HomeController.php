<?php

namespace App\UI\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController
{
    #[Route(path: '/', name: 'app_home')]
    public function __invoke(): Response
    {
        return new Response('OK Clean Architecture');
    }
}