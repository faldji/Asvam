<?php

namespace App\Repository;

use App\Entity\GenMot;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method GenMot|null find($id, $lockMode = null, $lockVersion = null)
 * @method GenMot|null findOneBy(array $criteria, array $orderBy = null)
 * @method GenMot[]    findAll()
 * @method GenMot[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GenMotRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GenMot::class);
    }

    // /**
    //  * @return GenMot[] Returns an array of GenMot objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GenMot
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
