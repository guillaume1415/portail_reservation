<?php

namespace App\Repository;

use App\Entity\Booking;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Persistence\ManagerRegistry;

class BookingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Booking::class);
    }

    public function findAskBooking(): array
    {
        return $this->findAsk()
            ->getQuery()
            ->getResult();
    }

    private function findAsk(): QueryBuilder
    {
        return $this->createQueryBuilder('p')
            ->join('p.Batiment', 'm')
            ->where('p.state = false');
    }

    public function findBooking(): array
    {
        return $this->findAllBooking()
            ->getQuery()
            ->getResult();
    }

    private function findAllBooking(): QueryBuilder
    {
        return $this->createQueryBuilder('p')
            ->join('p.Batiment', 'm')
            ->where('p.state = true');
    }



    private function findAllBookingForOne($id): QueryBuilder
    {
        return $this->createQueryBuilder('p')
            ->join('p.Batiment', 'm')
            ->join('p.name_assosiation', 'n')
            ->where('p.state = true')
            ->andWhere('p.name_assosiation = :id')
            ->setParameter('id', $id);
    }

    public function findBookingForOne($id): array
    {
        return $this->findAllBookingForOne($id)
            ->getQuery()
            ->getResult();
    }

    private function findAllAskForOne($id): QueryBuilder
    {
        return $this->createQueryBuilder('p')
            ->join('p.Batiment', 'm')
            ->join('p.name_assosiation', 'n')
            ->where('p.state = false')
            ->andWhere('p.name_assosiation = :id')
            ->setParameter('id', $id);
    }

    public function findAskForOne($id): array
    {
        return $this->findAllAskForOne($id)
            ->getQuery()
            ->getResult();
    }
}