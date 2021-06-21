<?php

namespace App\UI\Admin\Controller;

use App\Infrastructure\Entity\Page\Page;
use App\Infrastructure\Repository\PageRepository;
use App\Infrastructure\Form\PageType;
use Nourelhadi\Page\UseCase\ListingPages;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class PageController
{
    private Environment $twig;

    private UrlGeneratorInterface $urlGenerator;

    private PageRepository $pageRepository;

    private FormFactoryInterface $formFactory;

    public function __construct(
        Environment $twig, UrlGeneratorInterface $urlGenerator,
        PageRepository $pageRepository, FormFactoryInterface $formFactory
    )
    {
        $this->twig = $twig;
        $this->urlGenerator = $urlGenerator;
        $this->pageRepository = $pageRepository;
        $this->formFactory = $formFactory;
    }

    #[Route(path: '/post/listing', name: 'post_listing')]
    public function listing(): Response
    {
        $listingPages = new ListingPages($this->pageRepository);
        $listingPagesResponse = $listingPages->execute();

        return new Response($this->twig->render('ui/admin/page/listing.html.twig', [
            'pages' => $listingPagesResponse->getPages()
        ]));
    }

    #[Route(path: '/post/add', name: 'post_add')]
    public function add(Request $request): Response
    {
        $page = new Page();
        $form = $this->formFactory->create(PageType::class, $page);
        dd($form);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //then persist
        }

        return new Response(); // render view
    }
}