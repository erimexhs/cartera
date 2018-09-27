<?php

namespace App\Repository;

use App\Entity\ReciboDeCaja;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ReciboDeCaja|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReciboDeCaja|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReciboDeCaja[]    findAll()
 * @method ReciboDeCaja[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReciboDeCajaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ReciboDeCaja::class);
    }

//    /**
//     * @return ReciboDeCaja[] Returns an array of ReciboDeCaja objects
//     */
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
    public function findOneBySomeField($value): ?ReciboDeCaja
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
