<?php

namespace Nourelhadi\Tools\Data;

interface CrudDataInterface
{
    public function getEntity(): object;

    public function getFormClass(): string;

    public function hydrate(): void;
}