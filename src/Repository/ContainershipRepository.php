<?php

namespace App\Repository;

use App\Entity\Containership;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Containership|null find($id, $lockMode = null, $lockVersion = null)
 * @method Containership|null findOneBy(array $criteria, array $orderBy = null)
 * @method Containership[]    findAll()
 * @method Containership[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContainershipRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Containership::class);
    }

    // /**
    //  * @return Containership[] Returns an array of Containership objects
    //  */
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
    public function findOneBySomeField($value): ?Containership
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
