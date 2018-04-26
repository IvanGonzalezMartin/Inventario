<?php

namespace App\Infrastructure\Model\SizeTypeDoctrineRepository;

use App\Domain\Model\SizeType\SizeType;
use Doctrine\ORM\EntityRepository;


/**
 * @method SizeType|null find($id, $lockMode = null, $lockVersion = null)
 * @method SizeType|null findOneBy(array $criteria, array $orderBy = null)
 * @method SizeType[]    findAll()
 * @method SizeType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SizeTypeDoctrineRepository extends EntityRepository
{

//    /**
//     * @return SizeType[] Returns an array of SizeType objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SizeType
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
