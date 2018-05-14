<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 14/05/18
 * Time: 10:03
 */

namespace App\Application\Department\Update;


use App\Domain\Services\Department\DepartmentUpdaterService;

class DepartmentUpdate
{
    private $repository;

    public function __construct(DepartmentUpdaterService $departmentUpdaterService)
    {
        $this->repository = $departmentUpdaterService;
    }

    public function handler(DepartmentUpdateCommand $DepartmentUpdateCommand)
    {
        $id = $DepartmentUpdateCommand->id();
        $name = $DepartmentUpdateCommand->name();

        $this->repository->__invoke($id , $name);
    }
}