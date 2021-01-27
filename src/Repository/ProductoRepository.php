<?php

namespace App\Repository;

use App\Entity\Producto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ProductoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Producto::class);
    }

    public function masBaratoQue(int $precio)
    {
        $qb = $this->createQueryBuilder('p')
            ->where('p.precio < :precio')
            ->setParameter('precio', $precio)
            ->orderBy('p.id', 'ASC');

        $query = $qb->getQuery();
        return $query->execute();
    }
}