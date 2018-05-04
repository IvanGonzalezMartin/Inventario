<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 27/04/18
 * Time: 14:29
 */

namespace App\Domain\Services\Role;


use App\Domain\Model\Role\Role;
use App\Domain\Model\Role\RoleRepository;

class RoleCreatorService
{
    private $repository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->repository = $roleRepository;
    }

    public function __invoke(Role $role)
    {
        $this->repository->insert($role);
    }
}