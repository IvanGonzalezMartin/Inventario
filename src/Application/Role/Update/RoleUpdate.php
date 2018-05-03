<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 8:02
 */

namespace App\Application\Role\Update;


use App\Domain\Services\Role\RoleUpdater;

class RoleUpdate
{
    private $roleUpdater;

    public function __construct(RoleUpdater $roleUpdater)
    {
        $this->roleUpdater = $roleUpdater;
    }

    public function handler(RoleUpdateCommand $roleUpdateCommand)
    {
        $id = $roleUpdateCommand->id();
        $name = $roleUpdateCommand->name();
        $description = $roleUpdateCommand->description();

        $this->roleUpdater->__invoke($id , $name, $description);
    }
}