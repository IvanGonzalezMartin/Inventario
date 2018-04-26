<?php

namespace App\Infrastructure\Entity\ClotheCategoryDoctrineRepository;

use App\Entity\ClotheCategory;
use Doctrine\ORM\EntityRepository;


/**
 * @method ClotheCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClotheCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClotheCategory[]    findAll()
 * @method ClotheCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClotheCategoryDoctrineRepository extends EntityRepository
{

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
