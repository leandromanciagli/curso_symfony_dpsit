<?php

namespace App\Repository;

use App\Entity\Usuario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UsuarioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Usuario::class);
    }

    public function tieneCuenta(string $tipoDeCuenta)
    {
        $qb = $this->createQueryBuilder('u')
            ->where('u.email LIKE :tipoDeCuenta')
            ->setParameter('tipoDeCuenta', '%'.$tipoDeCuenta.'%')
            ->orderBy('u.id', 'ASC');

        $query = $qb->getQuery();
        return $query->execute();
    }
}