<?php

namespace Nourelhadi\Page\Entity;

interface PageInterface
{
    public function getId(): ?int;

    public function getIsExternal(): ?bool;

    public function setIsExternal(?bool $isExternal): self;

    public function getPath(): ?string;

    public function setPath(?string $path): self;

    public function getContent(): ?string;

    public function setContent(?string $content): self;
}