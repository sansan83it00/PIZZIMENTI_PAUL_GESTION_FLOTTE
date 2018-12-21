<?php

namespace App\Repository;

use App\Entity\ContainerModel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ContainerModel|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContainerModel|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContainerModel[]    findAll()
 * @method ContainerModel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContainerModelRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ContainerModel::class);
    }

    // /**
    //  * @return ContainerModel[] Returns an array of ContainerModel objects
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
    public function findOneBySomeField($value): ?ContainerModel
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
