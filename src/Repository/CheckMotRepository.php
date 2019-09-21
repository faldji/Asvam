<?php

namespace App\Repository;

use App\Entity\CheckMot;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CheckMot|null find($id, $lockMode = null, $lockVersion = null)
 * @method CheckMot|null findOneBy(array $criteria, array $orderBy = null)
 * @method CheckMot[]    findAll()
 * @method CheckMot[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CheckMotRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CheckMot::class);
    }

    // /**
    //  * @return CheckMot[] Returns an array of CheckMot objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CheckMot
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
