<?php

namespace App\Repository;

use App\Entity\Changer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Changer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Changer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Changer[]    findAll()
 * @method Changer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChangerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Changer::class);
    }

    // /**
    //  * @return Changer[] Returns an array of Changer objects
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
    public function findOneBySomeField($value): ?Changer
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
