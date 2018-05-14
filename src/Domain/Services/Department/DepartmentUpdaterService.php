<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 14/05/18
 * Time: 10:13
 */

namespace App\Domain\Services\Department;

use App\Domain\Model\Department\Department;
use App\Domain\Model\Department\DepartmentRepository;
use App\Domain\Model\Department\Exceptions\DepartmentAlreadyExistsException;
use App\Domain\Model\Department\Exceptions\DepartmentDoesntExistException;

class DepartmentUpdaterService
{
    private $repository;

    public function __construct(DepartmentRepository $departmentRepository)
    {
        $this->repository = $departmentRepository;
    }


    public function __invoke($id, $name)
    {
        $department = $this->repository->findById($id);

        if (empty($department))
            throw new DepartmentDoesntExistException($id);

        if (false === $department->isNotDeleted())
            throw new DepartmentDoesntExistException($id);

        $departmentName=$this->repository->findByName($name);

        if (false === empty($departmentName))
            throw new DepartmentAlreadyExistsException($name);

        $department->setName($name);

        $this->repository->updateAll();
    }
}