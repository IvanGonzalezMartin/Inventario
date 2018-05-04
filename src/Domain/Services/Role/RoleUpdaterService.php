<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 8:06
 */

namespace App\Domain\Services\Role;

use App\Domain\Model\Role\Exceptions\RolNotFoundException;
use App\Domain\Model\Role\RoleRepository;

class RoleUpdaterService
{
    private $repository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->repository = $roleRepository;
    }

    public function __invoke($id, string $name, $description)
    {
        $rol = $this->repository->getRolById($id);

        if (empty($rol))
            throw new RolNotFoundException($id);

        $rol->setName($name);
        $rol->setDescription($description);

        $this->repository->updateAll();
    }
}