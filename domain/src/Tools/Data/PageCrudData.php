<?php

namespace Nourelhadi\Tools\Data;

use Nourelhadi\Page\Entity\PageInterface;

class PageCrudData implements CrudDataInterface
{
    public ?bool $isExternal;

    public ?string $path;

    public ?string $content;

    public PageInterface $entity;

    public function getEntity(): object
    {
        return $this->entity;
    }

    public function getFormClass(): string
    {
        // TODO: Implement getFormClass() method.
    }

    public function hydrate(): void
    {
        // TODO: Implement hydrate() method.
    }
}