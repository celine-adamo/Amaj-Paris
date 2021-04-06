<?php

namespace App\Repository;

use App\Entity\Blaster;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Blaster|null find($id, $lockMode = null, $lockVersion = null)
 * @method Blaster|null findOneBy(array $criteria, array $orderBy = null)
 * @method Blaster[]    findAll()
 * @method Blaster[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlasterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Blaster::class);
    }

    // /**
    //  * @return Blaster[] Returns an array of Blaster objects
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
    public function findOneBySomeField($value): ?Blaster
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
