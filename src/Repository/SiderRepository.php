<?php

namespace App\Repository;

use App\Entity\Sider;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sider|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sider|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sider[]    findAll()
 * @method Sider[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SiderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sider::class);
    }

    // /**
    //  * @return Sider[] Returns an array of Sider objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Sider
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
