<?php

namespace App\Infrastructure\Model\DepartmentDoctrineRepository;

use App\Domain\Model\Department\Department;
use App\Domain\Model\Department\DepartmentRepository;
use Doctrine\ORM\EntityRepository;


/**
 * @method Department|null find($id, $lockMode = null, $lockVersion = null)
 * @method Department|null findOneBy(array $criteria, array $orderBy = null)
 * @method Department[]    findAll()
 * @method Department[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DepartmentDoctrineRepository extends EntityRepository implements DepartmentRepository
{

    /**
     * @param Department
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function insert(Department $department): void
    {
        $entityManager = $this->getEntityManager();
        $entityManager->persist($department);
        $entityManager->flush();
    }

    public function findByName($name)
    {
        return $this->findOneBy(['name' => $name]);
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function updateAll()
    {
        $this->getEntityManager()->flush();
    }

    public function findById($id)
    {
        return $this->findOneBy(["id" => $id]);
    }
}
