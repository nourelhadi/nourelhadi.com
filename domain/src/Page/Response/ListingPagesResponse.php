<?php

namespace Nourelhadi\Page\Response;

use Nourelhadi\Page\Entity\PageInterface;

class ListingPagesResponse
{
    /*** @var PageInterface[] */
    private array $pages;

    public function __construct(array $pages)
    {
        $this->pages = $pages;
    }

    public function getPages(): array
    {
        return $this->pages;
    }
}