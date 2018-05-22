<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 11:56
 */

namespace App\Domain\Services\Department;


use App\Domain\Model\Department\DepartmentRepository;
use App\Domain\Model\Department\Exceptions\DepartmentDoesntExistException;

class DepartmentCheckExistService
{
    /**
     * @var DepartmentRepository
     */
    private $repository;

    public function __construct(DepartmentRepository $departmentRepository)
    {
        $this->repository = $departmentRepository;
    }

    public function __invoke($id)
    {
        if (empty($this->repository->findById($id)))
            throw new DepartmentDoesntExistException($id);
    }
}