<?php

namespace Nourelhadi\Page\Gateway;

use Nourelhadi\Page\Entity\PageInterface;
use Nourelhadi\Tools\Data\CrudDataInterface;

abstract class FormBuilderPostGateway
{
    private CrudDataInterface $crudDataInterface;

    public function __construct(CrudDataInterface $crudDataInterface)
    {
        $this->crudDataInterface = $crudDataInterface;
    }

    abstract public function createForm(string $type, object $page);

    abstract public function handleRequester();

    abstract public function isSubmitted(): bool;

    abstract public function isValid(): bool;

    abstract public function renderView();

    public function getCrudData(): CrudDataInterface
    {
        return $this->crudDataInterface;
    }
}