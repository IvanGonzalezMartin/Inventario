<?php

namespace App\Repository;

use App\Entity\ClotheSizeStock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ClotheSizeStock|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClotheSizeStock|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClotheSizeStock[]    findAll()
 * @method ClotheSizeStock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClotheSizeStockRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ClotheSizeStock::class);
    }

//    /**
//     * @return ClotheSizeStock[] Returns an array of ClotheSizeStock objects
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
    public function findOneBySomeField($value): ?ClotheSizeStock
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
