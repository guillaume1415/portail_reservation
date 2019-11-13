<?php

namespace App\Repository;

use App\Entity\HalleAB;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method HalleAB|null find($id, $lockMode = null, $lockVersion = null)
 * @method HalleAB|null findOneBy(array $criteria, array $orderBy = null)
 * @method HalleAB[]    findAll()
 * @method HalleAB[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HalleABRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HalleAB::class);
    }

    // /**
    //  * @return HalleAB[] Returns an array of HalleAB objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HalleAB
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
