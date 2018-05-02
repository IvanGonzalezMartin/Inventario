<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 9:57
 */

namespace App\Application\Departament\Create;


use App\Domain\Model\Department\Department;
use App\Domain\Services\Department\DepartmentCreator;

class DepartmentCreate
{
    private $departmentCreate;

    public function __construct(DepartmentCreator $departmentCreate)
    {
        $this->departmentCreate = $departmentCreate;
    }

    public function handler(DepartmentCreateCommand $departmentCreateCommand)
    {
        $department = new Department('1' ,'asdasd');
        $department->setName($departmentCreateCommand->getName());
        $this->departmentCreate->__invoke($department);
    }
}