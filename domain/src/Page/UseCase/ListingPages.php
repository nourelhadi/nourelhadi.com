<?php

namespace Nourelhadi\Page\UseCase;

use Nourelhadi\Page\Repository\PageRepositoryInterface;
use Nourelhadi\Page\Response\ListingPagesResponse;

class ListingPages
{
    private PageRepositoryInterface $pageRepository;

    public function __construct(PageRepositoryInterface $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    public function execute(): ListingPagesResponse
    {
        return new ListingPagesResponse($this->pageRepository->getAll());
    }
}