<?php

namespace App\Repository;

use App\Entity\Banco;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Banco|null find($id, $lockMode = null, $lockVersion = null)
 * @method Banco|null findOneBy(array $criteria, array $orderBy = null)
 * @method Banco[]    findAll()
 * @method Banco[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BancoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Banco::class);
    }

    public function save($request,$banco) {

        $em = $this->getEntityManager();

        $banco->setNombre($request->get('agregar-nombre'));
        $banco->setNumeroCuenta($request->get('agregar-cuenta'));
        $banco->setActivo(true);
        date_default_timezone_set("America/Bogota");
        $banco->setFechaCreacion(new \DateTime(date("Y-m-d H:i:s")));
        $em->persist($banco);
        $em->flush();
        $em->close();
        return $banco;    
    }

    public function update($request,$banco) {

        $em = $this->getEntityManager();

        $banco->setNombre($request->get('nombre'));
        $banco->setNumeroCuenta($request->get('cuenta'));
        $banco->setActivo(($request->get('activo') != null ? true : false));
        $em->persist($banco);
        $em->flush();
        $em->close();
        return $banco;    
    }

    

//    /**
//     * @return Banco[] Returns an array of Banco objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Banco
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
