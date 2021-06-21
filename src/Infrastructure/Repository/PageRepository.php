<?php


namespace App\Infrastructure\Repository;

use App\Infrastructure\Entity\Page\Page;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Nourelhadi\Page\Entity\PageInterface;
use Nourelhadi\Page\Repository\PageRepositoryInterface;

class PageRepository extends ServiceEntityRepository implements PageRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Page::class);
    }

    public function getOneById(int $id): PageInterface
    {
        $qb = $this->createQueryBuilder('page')
            ->andWhere('page.id = :id')
            ->setParameter('id', $id);

        return $qb->getQuery()->getOneOrNullResult();
    }

    public function getAll(): array
    {
        $qb = $this->createQueryBuilder('page')
            ->orderBy('page.id', 'DESC');

        return $qb->getQuery()->getResult();
    }

}