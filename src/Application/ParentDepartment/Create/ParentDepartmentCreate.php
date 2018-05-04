<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 11:20
 */

namespace App\Application\ParentDepartment\Create;


use App\Domain\Model\Department\DepartmentRepository;
use App\Domain\Model\ParentDepartment\ParentDepartment;
use App\Domain\Services\ParentDepartment\ParentDepartmentCreator;

class ParentDepartmentCreate
{
    private $parentDepartmentCreator;

    public function __construct(ParentDepartmentCreator $parentDepartmentCreator)
    {
        $this->parentDepartmentCreator = $parentDepartmentCreator;
    }

    public function handler(ParentDepartmentCreateCommand $parentDepartmentCreateCommand)
    {
        $parent = new ParentDepartment($parentDepartmentCreateCommand->getName());
        $this->parentDepartmentCreator->__invoke($parent);
    }
}