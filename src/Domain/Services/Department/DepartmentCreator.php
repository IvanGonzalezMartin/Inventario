<?php

namespace App\Domain\Services\Department;

use App\Domain\Model\Department\Department;
use App\Domain\Model\Department\DepartmentRepository;

class DepartmentCreator
{
    private $repository;

    public function __construct(DepartmentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Department $department)
    {
       $this->repository->insert($department);
    }
}