<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 21/05/18
 * Time: 14:01
 */

namespace App\Domain\Services\ParentDepartment;

use App\Domain\Model\DeleteThing\DeleteThing;
use App\Domain\Model\DeleteThing\DeleteThingRepository;
use App\Domain\Model\Department\DepartmentRepository;
use App\Domain\Model\ParentDepartment\Exceptions\ParentDepartmentDosentExistsException;
use App\Domain\Model\ParentDepartment\Exceptions\ParentDepartmentHaveDepartmentsException;
use App\Domain\Model\ParentDepartment\ParentDepartmentRepository;
use Ramsey\Uuid\Uuid;

class ParentDeparmentDeletorService
{

    private $repository;

    /**
     * @var DeleteThingRepository
     */
    private $deleteThingRepository;
    private $departmentRepository;


    public function __construct(ParentDepartmentRepository $parentDepartmentRepository, DepartmentRepository $departmentRepository, DeleteThingRepository $deleteThingRepository)
    {
        $this->repository = $parentDepartmentRepository;
        $this->deleteThingRepository = $deleteThingRepository;
        $this->departmentRepository = $departmentRepository;
    }


    public function __invoke($id)
    {
        $parentDepartment = $this->repository->findById($id);

        if (empty($parentDepartment))
            throw new ParentDepartmentDosentExistsException($id);

        if (false === empty($this->departmentRepository->findByParentDepartment($id)))
            throw new ParentDepartmentHaveDepartmentsException();

        $uuid = Uuid::uuid4();

        $this->deleteThingRepository->insert(new DeleteThing($id, $uuid, 'ParentDepartment'));

        $parentDepartment->setDeleteID($uuid);

        $this->repository->update();

    }
}