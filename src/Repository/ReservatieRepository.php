<?php

namespace App\Repository;

use App\Entity\Reservatie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Reservatie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reservatie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reservatie[]    findAll()
 * @method Reservatie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReservatieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reservatie::class);
    }

    // /**
    //  * @return Reservatie[] Returns an array of Reservatie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Reservatie
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
