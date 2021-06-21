<?php

namespace Nourelhadi\Page\Repository;

use Nourelhadi\Page\Entity\PageInterface;

interface PageRepositoryInterface
{
    public function getOneById(int $id): PageInterface;

    /** @return PageInterface[] */
    public function getAll(): array;
}