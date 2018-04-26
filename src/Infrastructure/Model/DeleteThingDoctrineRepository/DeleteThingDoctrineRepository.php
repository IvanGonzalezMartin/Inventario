<?php

namespace App\Infrastructure\Model\DeleteThingDoctrineRepository;

use App\Domain\Model\DeleteThing\DeleteThing;
use Doctrine\ORM\EntityRepository;


/**
 * @method DeleteThing|null find($id, $lockMode = null, $lockVersion = null)
 * @method DeleteThing|null findOneBy(array $criteria, array $orderBy = null)
 * @method DeleteThing[]    findAll()
 * @method DeleteThing[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeleteThingDoctrineRepository extends EntityRepository
{
//    /**
//     * @return DeleteThing[] Returns an array of DeleteThing objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DeleteThing
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
