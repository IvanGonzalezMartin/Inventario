<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 11:56
 */

namespace App\Domain\Services\ParentDepartment;


use App\Domain\Model\ParentDepartment\ParentDepartment;
use App\Domain\Model\ParentDepartment\ParentDepartmentRepository;

class ParentDepartmentCreator
{
    private $repository;

    public function __construct(ParentDepartmentRepository $parentDepartmentRepository)
    {
        $this->repository = $parentDepartmentRepository;
    }

    public function __invoke(ParentDepartment $parentDepartment)
    {
        $this->repository->insert($parentDepartment);
    }
}