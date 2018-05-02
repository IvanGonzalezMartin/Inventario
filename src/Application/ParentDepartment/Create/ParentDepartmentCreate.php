<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 11:54
 */

namespace App\Application\ParentDepartment\Create;

use App\Domain\Model\ParentDepartment\ParentDepartment;
use App\Domain\Services\ParentDepartment\ParentDepartmentCreator;

class ParentDepartmentCreate
{
    private $parentDepartamentCreator;

    public function __construct(ParentDepartmentCreator $parentDepartamentCreator)
    {
        $this->parentDepartamentCreator = $parentDepartamentCreator;
    }

    public function handler(ParentDepartmentCreateCommand $departmentCreateCommand)
    {
        $parent = new ParentDepartment("first");
        $parent->setName($departmentCreateCommand->getName());
        $this->parentDepartamentCreator->__invoke($parent);
    }
}