<?php

namespace App\Repository;

use App\Entity\BookingSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method BookingSearch|null find($id, $lockMode = null, $lockVersion = null)
 * @method BookingSearch|null findOneBy(array $criteria, array $orderBy = null)
 * @method BookingSearch[]    findAll()
 * @method BookingSearch[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookingSearchRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BookingSearch::class);
    }

    // /**
    //  * @return BookingSearch[] Returns an array of BookingSearch objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BookingSearch
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
