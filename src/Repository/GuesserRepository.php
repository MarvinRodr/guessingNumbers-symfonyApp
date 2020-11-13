<?php

namespace App\Repository;

use App\Entity\Guesser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Guesser|null find($id, $lockMode = null, $lockVersion = null)
 * @method Guesser|null findOneBy(array $criteria, array $orderBy = null)
 * @method Guesser[]    findAll()
 * @method Guesser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GuesserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Guesser::class);
    }

    // /**
    //  * @return Guesser[] Returns an array of Guesser objects
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
    public function findOneBySomeField($value): ?Guesser
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
