<?php

namespace App\Repository;

use App\Entity\ImageCasier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ImageCasier|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageCasier|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageCasier[]    findAll()
 * @method ImageCasier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageCasierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImageCasier::class);
    }

    // /**
    //  * @return ImageCasier[] Returns an array of ImageCasier objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ImageCasier
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
