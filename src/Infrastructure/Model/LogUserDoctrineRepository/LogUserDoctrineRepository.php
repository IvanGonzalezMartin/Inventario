<?php

namespace App\Infrastructure\Model\LogUserDoctrineRepository;

use App\Domain\Model\LogUser\LogUser;
use App\Domain\Model\LogUser\LogUserRepository;
use Doctrine\ORM\EntityRepository;

/**
 * @method LogUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method LogUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method LogUser[]    findAll()
 * @method LogUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LogUserDoctrineRepository extends EntityRepository implements LogUserRepository
{

//    /**
//     * @return LogUser[] Returns an array of LogUser objects
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
    public function findOneBySomeField($value): ?LogUser
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findByToken($token)
    {
        return $this->findOneBy(['token' => $token, 'endDate' => null]);
    }

    public function findByUser($user)
    {
        return $this->findOneBy(['userID' => $user, 'endDate' => null]);
    }

    /**
     * @param LogUser $logUser
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function logIn(LogUser $logUser)
    {
        $this->getEntityManager()->persist($logUser);
        $this->getEntityManager()->flush();
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function update()
    {
        $this->getEntityManager()->flush();
    }
}
