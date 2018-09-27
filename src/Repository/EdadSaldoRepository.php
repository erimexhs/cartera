<?php

namespace App\Repository;

use App\Entity\EdadSaldo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EdadSaldo|null find($id, $lockMode = null, $lockVersion = null)
 * @method EdadSaldo|null findOneBy(array $criteria, array $orderBy = null)
 * @method EdadSaldo[]    findAll()
 * @method EdadSaldo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EdadSaldoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EdadSaldo::class);
    }

//    /**
//     * @return EdadSaldo[] Returns an array of EdadSaldo objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EdadSaldo
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
