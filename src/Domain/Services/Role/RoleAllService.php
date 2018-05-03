<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 9:34
 */

namespace App\Domain\Services\Role;


use App\Domain\Model\Role\RoleRepository;

class RoleAllService
{
    private $repository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->repository = $roleRepository;
    }

    public function __invoke()
    {
        return $this->repository->getAll();
    }
}