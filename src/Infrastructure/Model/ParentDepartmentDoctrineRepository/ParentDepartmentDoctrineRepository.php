<?php

namespace App\Infrastructure\Model\ParentDepartmentDoctrineRepository;

use App\Domain\Model\Department\DepartmentRepository;
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

    /**
     * @param ParentDepartment $parentDepartment
     * @throws \Doctrine\ORM\ORMException
     */
    public function insert(ParentDepartment $parentDepartment): void
    {
        $entityManager = $this->getEntityManager();
        $entityManager->persist($parentDepartment);
    }

    /**
     * @param $id
     * @return ParentDepartment|null
     */
    public function getParentDepartmentByID($id)
    {
       return $this->findOneBy(['id' => $id, 'deleteID' => null]);
    }

    /**
     * @param $name
     * @return ParentDepartment|null
     */
    public function findByName($name)
    {
        return $this->findOneBy(['name' => $name, 'deleteID' => null]);
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
