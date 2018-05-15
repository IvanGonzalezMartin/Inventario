<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 12:56
 */

namespace App\Domain\Services\Manager;


use App\Domain\Model\Manager\Manager;
use App\Domain\Model\Manager\ManagerRepository;
use App\Domain\Model\Role\Exceptions\RolNotFoundException;
use App\Domain\Model\Role\RoleRepository;

class ManagerCreatorService
{
    private $repository;
    /**
     * @var ManagerCheckNickNameService
     */
    private $checkNickName;
    /**
     * @var ManagerCheckEmailService
     */
    private $checkEmail;
    /**
     * @var RoleRepository
     */
    private $roleRepository;

    public function __construct(ManagerRepository $managerRepository, ManagerCheckNickNameService $checkNickName, ManagerCheckEmailService $checkEmail, RoleRepository $roleRepository)
    {
        $this->repository = $managerRepository;
        $this->checkNickName = $checkNickName;
        $this->checkEmail = $checkEmail;
        $this->roleRepository = $roleRepository;
    }

    public function __invoke(Manager $manager)
    {
        $this->checkEmail->__invoke($manager->getEmail());
        $this->checkNickName->__invoke($manager->getNickName());

        if (empty($this->roleRepository->getRolById($manager->getRolID())))
            throw new RolNotFoundException($manager->getRolID());

        $this->repository->insert($manager);
    }
}