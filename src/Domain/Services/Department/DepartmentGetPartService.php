<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 10:22
 */

namespace App\Domain\Services\Department;


use App\Application\Department\GetPart\DepartmentGetPartCommand;
use App\Domain\Model\Department\DepartmentRepository;

class DepartmentGetPartService
{
    /**
     * @var DepartmentRepository
     */
    private $repository;


    public function __construct(DepartmentRepository $departmentRepository)
    {
        $this->repository = $departmentRepository;
    }

    /**
     * @return mixed
     */
    public function __invoke(DepartmentGetPartCommand $departmentGetPartCommand)
    {
        return $this->repository->findArrayById($departmentGetPartCommand->id());
    }
}