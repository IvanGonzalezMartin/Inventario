<?php

namespace App\Infrastructure\Entity\ProfilerDetailsDoctrineRepository;

use App\Entity\ProfilerDetails;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProfilerDetails|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProfilerDetails|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProfilerDetails[]    findAll()
 * @method ProfilerDetails[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfilerDetailsDoctrineRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProfilerDetails::class);
    }

//    /**
//     * @return ProfilerDetails[] Returns an array of ProfilerDetails objects
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
    public function findOneBySomeField($value): ?ProfilerDetails
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
