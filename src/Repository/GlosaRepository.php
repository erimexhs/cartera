<?php

namespace App\Repository;

use App\Entity\Glosa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Glosa|null find($id, $lockMode = null, $lockVersion = null)
 * @method Glosa|null findOneBy(array $criteria, array $orderBy = null)
 * @method Glosa[]    findAll()
 * @method Glosa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GlosaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Glosa::class);
    }

//    /**
//     * @return Glosa[] Returns an array of Glosa objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Glosa
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
