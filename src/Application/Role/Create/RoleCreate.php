<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 27/04/18
 * Time: 14:35
 */

namespace App\Application\Role\Create;


use App\Domain\Model\Role\Role;
use App\Domain\Services\Role\RoleCreatorService;

class RoleCreate
{
    private $roleCreator;

    public function __construct(RoleCreatorService $roleCreator)
    {
        $this->roleCreator = $roleCreator;
    }

    public function handler(RoleCreateCommand $roleCreateCommand)
    {
        $role = new Role($roleCreateCommand->name());
        $role->setDescription($roleCreateCommand->description());
        $this->roleCreator->__invoke($role);
    }
}