<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 9:26
 */

namespace App\Application\Department\Create;


use App\Domain\Model\Department\Department;
use App\Domain\Services\Department\DepartmentCreator;

class DepartmentCreate
{
    private $departmentCreator;

    public function __construct(DepartmentCreator $departmentCreator)
    {
        $this->departmentCreator = $departmentCreator;
    }

    public function handler(DepartmentCreateCommand $departmentCreateCommand)
    {
        $department = new Department($departmentCreateCommand->getParentID(),$departmentCreateCommand->getName());
        $this->departmentCreator->__invoke($department);
    }
}