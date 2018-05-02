<?php

namespace App\Infrastructure\Model\ParentDepartmentDoctrineRepository;

use App\Domain\Model\ParentDepartment\ParentDepartment;
use App\Domain\Model\ParentDepartment\ParentDepartmentRepository;
use Doctrine\ORM\EntityRepository;



class ParentDepartmentDoctrineRepository extends EntityRepository implements ParentDepartmentRepository
{
    /**
     * @param ParentDepartment
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function insert(ParentDepartment $parentDepartment): void
    {
        $entityManager = $this->getEntityManager();
        $entityManager->persist($parentDepartment);
        $entityManager->flush();
    }
}
