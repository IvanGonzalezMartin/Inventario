<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 9:15
 */

namespace App\Domain\Services\ParentDepartment;


use App\Domain\Model\ParentDepartment\ParentDepartmentRepository;

class ParentDepartmentGetAllService
{
    /**
     * @var ParentDepartmentRepository
     */
    private $repository;


    public function __construct(ParentDepartmentRepository $parentDepartmentRepository)
    {
        $this->repository = $parentDepartmentRepository;
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        return $this->repository->getAll();
    }
}