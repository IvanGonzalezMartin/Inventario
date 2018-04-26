<?php

namespace App\Repository;

use App\Entity\LogManager;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LogManager|null find($id, $lockMode = null, $lockVersion = null)
 * @method LogManager|null findOneBy(array $criteria, array $orderBy = null)
 * @method LogManager[]    findAll()
 * @method LogManager[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LogManagerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LogManager::class);
    }

//    /**
//     * @return LogManager[] Returns an array of LogManager objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LogManager
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
