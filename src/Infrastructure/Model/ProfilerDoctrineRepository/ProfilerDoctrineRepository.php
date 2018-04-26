<?php

namespace App\Infrastructure\Model\ProfilerDoctrineRepository;

use App\Domain\Model\Profiler\Profiler;
use Doctrine\ORM\EntityRepository;


/**
 * @method Profiler|null find($id, $lockMode = null, $lockVersion = null)
 * @method Profiler|null findOneBy(array $criteria, array $orderBy = null)
 * @method Profiler[]    findAll()
 * @method Profiler[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfilerDoctrineRepository extends EntityRepository
{

//    /**
//     * @return Profiler[] Returns an array of Profiler objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Profiler
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
