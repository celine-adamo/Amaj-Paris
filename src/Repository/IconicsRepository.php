<?php

namespace App\Repository;

use App\Entity\Iconics;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Iconics|null find($id, $lockMode = null, $lockVersion = null)
 * @method Iconics|null findOneBy(array $criteria, array $orderBy = null)
 * @method Iconics[]    findAll()
 * @method Iconics[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IconicsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Iconics::class);
    }

    /**
     * @return Iconics[] Returns an array of Iconics objects
     */
    public function findAllIconics(): array
    {
        return $this->createQueryBuilder('i')
            ->orderBy('i.id', 'DESC')
            ->setMaxResults(9)
            ->getQuery()
            ->getResult()
            ;
    }

    // /**
    //  * @return Iconics[] Returns an array of Iconics objects
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
    public function findOneBySomeField($value): ?Iconics
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
