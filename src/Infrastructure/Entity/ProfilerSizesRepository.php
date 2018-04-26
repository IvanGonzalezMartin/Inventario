<?php

namespace App\Repository;

use App\Entity\ProfilerSizes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProfilerSizes|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProfilerSizes|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProfilerSizes[]    findAll()
 * @method ProfilerSizes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfilerSizesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProfilerSizes::class);
    }

//    /**
//     * @return ProfilerSizes[] Returns an array of ProfilerSizes objects
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
    public function findOneBySomeField($value): ?ProfilerSizes
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
