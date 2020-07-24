<?php

namespace App\Repository;

use App\Entity\BonsaiType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BonsaiType|null find($id, $lockMode = null, $lockVersion = null)
 * @method BonsaiType|null findOneBy(array $criteria, array $orderBy = null)
 * @method BonsaiType[]    findAll()
 * @method BonsaiType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BonsaiTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BonsaiType::class);
    }
}
