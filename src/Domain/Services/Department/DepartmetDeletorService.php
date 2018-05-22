<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 8:09
 */

namespace App\Domain\Services\Department;


use App\Domain\Model\DeleteThing\DeleteThing;
use App\Domain\Model\DeleteThing\DeleteThingRepository;
use App\Domain\Model\Department\DepartmentRepository;
use App\Domain\Model\Department\Exceptions\DepartmentDoesntExistException;
use App\Domain\Model\Department\Exceptions\DepartmentHaveUsersException;
use App\Domain\Model\User\UserRepository;
use Ramsey\Uuid\Uuid;

class DepartmetDeletorService
{
    private $repository;

    /**
     * @var DeleteThingRepository
     */
    private $deleteThingRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * DepartmetDeletorService constructor.
     * @param $repository
     */
    public function __construct(DepartmentRepository $departmentRepository, DeleteThingRepository $deleteThingRepository, UserRepository $userRepository)
    {
        $this->repository = $departmentRepository;
        $this->deleteThingRepository = $deleteThingRepository;
        $this->userRepository = $userRepository;
    }

    public function __invoke($id)
    {
        $department = $this->repository->findById($id);

        if (empty($department))
            throw new DepartmentDoesntExistException($id);

        if (false === empty($this->userRepository->findByID($id)))
            throw new DepartmentHaveUsersException();

        $uuid = Uuid::uuid4();

        $this->deleteThingRepository->insert(new DeleteThing($id,$uuid,"Department"));

        $department->setDeleteID($uuid);

        $this->repository->update();
    }
}