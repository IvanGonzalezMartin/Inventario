<?php

namespace App\Infrastructure\Model\UserDoctrineRepository;

use App\Domain\Model\User\User;
use App\Domain\Model\User\UserRepository;
use Doctrine\ORM\EntityRepository;


/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserDoctrineRepository extends EntityRepository implements UserRepository
{

    public function findByID($id)
    {
        return $this->findOneBy(['id' => $id, 'deleteID' =>null]);
    }

    public function findByNickName($nickName)
    {
        return $this->findOneBy(['nickName' => $nickName, 'deleteID' =>null]);
    }

    public function findByEmail($email)
    {
        return $this->findOneBy(['email' => $email, 'deleteID' =>null]);
    }

    public function findByNif($nif)
    {
        return $this->findOneBy(['nif' => $nif, 'deleteID' =>null]);
    }

    public function findByEmployeeCode($employeeCode)
    {
        return $this->findOneBy(['employeeCode' => $employeeCode, 'deleteID' =>null]);
    }

    /**
     * @param User $user
     * @throws \Doctrine\ORM\ORMException
     */
    public function insert(User $user)
    {
        $this->getEntityManager()->persist($user);

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
