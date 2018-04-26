<?php

namespace App\Infrastructure\Entity\ClotheDoctrineRepository;

use App\Entity\Clothe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Clothe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Clothe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Clothe[]    findAll()
 * @method Clothe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClotheDoctrineRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Clothe::class);
    }

//    /**
//     * @return Clothe[] Returns an array of Clothe objects
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
    public function findOneBySomeField($value): ?Clothe
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
