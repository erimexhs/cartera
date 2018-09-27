<?php

namespace App\Repository;

use App\Entity\CarteraLog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CarteraLog|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarteraLog|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarteraLog[]    findAll()
 * @method CarteraLog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarteraLogRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CarteraLog::class);
    }

//    /**
//     * @return CarteraLog[] Returns an array of CarteraLog objects
//     */
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
    public function findOneBySomeField($value): ?CarteraLog
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
