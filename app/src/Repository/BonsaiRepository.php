<?php

namespace App\Repository;

use App\Entity\bonsai;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method bonsai|null find($id, $lockMode = null, $lockVersion = null)
 * @method bonsai|null findOneBy(array $criteria, array $orderBy = null)
 * @method bonsai[]    findAll()
 * @method bonsai[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BonsaiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bonsai::class);
    }
}
