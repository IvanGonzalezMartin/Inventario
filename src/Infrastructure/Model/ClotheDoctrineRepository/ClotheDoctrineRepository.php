<?php

namespace App\Infrastructure\Model\ClotheDoctrineRepository;


use App\Domain\Model\Clothe\Clothe;
use App\Domain\Model\Clothe\ClotheInterfaceRepository;
use Doctrine\ORM\EntityRepository;


/**
 * @method Clothe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Clothe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Clothe[]    findAll()
 * @method Clothe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClotheDoctrineRepository extends EntityRepository implements ClotheInterfaceRepository
{

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
