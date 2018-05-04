<?php

namespace App\Infrastructure\Model\ManagerDoctrineRepository;

use App\Domain\Model\Manager\Manager;
use App\Domain\Model\Manager\ManagerRepository;
use Doctrine\ORM\EntityRepository;


/**
 * @method Manager|null find($id, $lockMode = null, $lockVersion = null)
 * @method Manager|null findOneBy(array $criteria, array $orderBy = null)
 * @method Manager[]    findAll()
 * @method Manager[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ManagerDoctrineRepository extends EntityRepository implements ManagerRepository
{
    public function getManagerByName($nickName)
    {
        return $this->findOneBy(['nickName' => $nickName]);
    }

    public function getManagerByEmail($email)
    {
        return $this->findOneBy(['email' => $email]);
    }
}
