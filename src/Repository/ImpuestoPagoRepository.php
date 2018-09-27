<?php

namespace App\Repository;

use App\Entity\ImpuestoPago;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ImpuestoPago|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImpuestoPago|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImpuestoPago[]    findAll()
 * @method ImpuestoPago[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImpuestoPagoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ImpuestoPago::class);
    }

//    /**
//     * @return ImpuestoPago[] Returns an array of ImpuestoPago objects
//     */
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
    public function findOneBySomeField($value): ?ImpuestoPago
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
