<?php

namespace App\Infrastructure\Entity\DeleteThingDoctrineRepository;

use App\Entity\DeleteThing;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DeleteThing|null find($id, $lockMode = null, $lockVersion = null)
 * @method DeleteThing|null findOneBy(array $criteria, array $orderBy = null)
 * @method DeleteThing[]    findAll()
 * @method DeleteThing[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeleteThingDoctrineRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DeleteThing::class);
    }

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
