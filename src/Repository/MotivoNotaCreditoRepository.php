<?php

namespace App\Repository;

use App\Entity\MotivoNotaCredito;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MotivoNotaCredito|null find($id, $lockMode = null, $lockVersion = null)
 * @method MotivoNotaCredito|null findOneBy(array $criteria, array $orderBy = null)
 * @method MotivoNotaCredito[]    findAll()
 * @method MotivoNotaCredito[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MotivoNotaCreditoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MotivoNotaCredito::class);
    }

//    /**
//     * @return MotivoNotaCredito[] Returns an array of MotivoNotaCredito objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MotivoNotaCredito
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
