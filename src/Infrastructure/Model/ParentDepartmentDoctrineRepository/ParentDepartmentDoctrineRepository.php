<?php

namespace App\Infrastructure\Model\ParentDepartmentDoctrineRepository;

use App\Domain\Model\ParentDepartment\ParentDepartment;
use App\Domain\Model\ParentDepartment\ParentDepartmentRepository;
use Doctrine\ORM\EntityRepository;


/**
 * @method ParentDepartment|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParentDepartment|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParentDepartment[]    findAll()
 * @method ParentDepartment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParentDepartmentDoctrineRepository extends EntityRepository implements ParentDepartmentRepository
{

//    /**
//     * @return ParentDepartment[] Returns an array of ParentDepartment objects
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
    public function findOneBySomeField($value): ?ParentDepartment
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
