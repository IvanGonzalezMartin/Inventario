<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 12:51
 */

namespace App\Domain\Services\ParentDepartment;


use App\Domain\Model\ParentDepartment\Exceptions\ParentDepartmentAlreadyExistsException;
use App\Domain\Model\ParentDepartment\Exceptions\ParentDepartmentDosentExistsException;
use App\Domain\Model\ParentDepartment\ParentDepartment;
use App\Domain\Model\ParentDepartment\ParentDepartmentRepository;

class ParentDepartmentUpdaterService
{
    /**
     * @var ParentDepartmentRepository
     */
    private $repository;

    /**
     * ParentDepartmentUpdaterService constructor.
     * @param ParentDepartmentRepository $departmentRepository
     */
    public function __construct(ParentDepartmentRepository $parentDepartmentRepository)
    {
        $this->repository = $parentDepartmentRepository;
    }

    /**
     * @param $id
     * @param $name
     * @throws \Assert\AssertionFailedException
     */
    public function __invoke($id, $name)
    {
        $parent = $this->repository->getParentDepartmentByID($id);

        if(empty($parent))
            throw new ParentDepartmentDosentExistsException($id);

        $parentName = $this->repository->findByName($name);

        if (false === empty($parentName))
            throw new ParentDepartmentAlreadyExistsException($name);

        $parent->setName($name);

        $this->repository->update();
    }
}