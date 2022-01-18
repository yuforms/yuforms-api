<?php

namespace App\Repository;

use App\Entity\Submit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Submit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Submit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Submit[]    findAll()
 * @method Submit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubmitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Submit::class);
    }

    // /**
    //  * @return Submit[] Returns an array of Submit objects
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
    public function findOneBySomeField($value): ?Submit
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
