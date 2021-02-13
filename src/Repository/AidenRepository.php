<?php

namespace App\Repository;

use App\Entity\Aiden;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Aiden|null find($id, $lockMode = null, $lockVersion = null)
 * @method Aiden|null findOneBy(array $criteria, array $orderBy = null)
 * @method Aiden[]    findAll()
 * @method Aiden[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AidenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Aiden::class);
    }

    // /**
    //  * @return Aiden[] Returns an array of Aiden objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Aiden
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
