<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 9:27
 */

namespace App\Application\Role\AllRoles;


use App\Domain\Services\Role\RolesAll;

class RoleAll
{
    private $roleAll;
    private $dataTransform;

    public function __construct(RolesAll $roleCreator, RoleAllDataTransform $dataTransform)
    {
        $this->roleAll = $roleCreator;
        $this->dataTransform = $dataTransform;
    }

    public function handler(RoleAllCommand $roleCreateCommand)
    {
       $roles = $this->roleAll->__invoke();

       return $this->dataTransform->transform($roles);
    }
}