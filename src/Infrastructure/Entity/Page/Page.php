<?php

namespace App\Infrastructure\Entity\Page;

use Nourelhadi\Page\Entity\PageInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Page implements PageInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private ?bool $isExternal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $path;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $content;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsExternal(): ?bool
    {
        return $this->isExternal;
    }

    public function setIsExternal(?bool $isExternal): PageInterface
    {
        $this->isExternal = $isExternal;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): PageInterface
    {
        $this->path = $path;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): PageInterface
    {
        $this->content = $content;

        return $this;
    }
}