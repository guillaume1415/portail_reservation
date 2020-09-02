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
}