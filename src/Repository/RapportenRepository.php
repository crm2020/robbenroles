<?php

namespace App\Repository;

use App\Entity\Rapporten;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Rapporten|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rapporten|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rapporten[]    findAll()
 * @method Rapporten[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RapportenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rapporten::class);
    }

    // /**
    //  * @return Rapporten[] Returns an array of Rapporten objects
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
    public function findOneBySomeField($value): ?Rapporten
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
