<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 12:56
 */

namespace App\Domain\Services\Manager;

use App\Application\Manager\Update\ManagerUpdateCommand;
use App\Domain\Model\Manager\Exceptions\ManagerWithIdDoesntExistsException;
use App\Domain\Model\Manager\ManagerRepository;
use App\Domain\Model\Role\Exceptions\RolNotFoundException;
use App\Domain\Model\Role\RoleRepository;


class ManagerUpdatorService
{
    /**
     * @var ManagerRepository
     */
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

    /**
     * @param ManagerUpdateCommand $manager
     * @param $id
     * @throws \Assert\AssertionFailedException
     */
    public function __invoke(ManagerUpdateCommand $manager)
    {
        $oldManager = $this->repository->getManagerByID($manager->id());

        if (empty($oldManager))
            throw new ManagerWithIdDoesntExistsException($manager->id());

        if ($manager->email() != $oldManager->getEmail())
            $this->checkEmail->__invoke($manager->email());

        if ($manager->nickName() != $oldManager->getNickName())
            $this->checkNickName->__invoke($manager->nickName());

        if (empty($this->roleRepository->getRolById($manager->rolID())))
            throw new RolNotFoundException($manager->rolID());

        ManagerSetAllParamsService::execute($oldManager, $manager);

        $this->repository->update();
    }
}