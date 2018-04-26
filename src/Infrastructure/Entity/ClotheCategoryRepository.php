<?php

namespace App\Repository;

use App\Entity\ClotheCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ClotheCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClotheCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClotheCategory[]    findAll()
 * @method ClotheCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClotheCategoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ClotheCategory::class);
    }

//    /**
//     * @return ClotheCategory[] Returns an array of ClotheCategory objects
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
    public function findOneBySomeField($value): ?ClotheCategory
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
