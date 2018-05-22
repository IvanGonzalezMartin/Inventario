<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 9:14
 */

namespace App\Application\ParentDepartment\GetAll;


use App\Domain\Services\ParentDepartment\ParentDepartmentGetAllService;

class ParentDepartmentGetAll
{
    private $parentDepartmentGetAllService;
    private $dataTransform;

    public function __construct(ParentDepartmentGetAllService $parentDepartmentGetAllService, ParentDepartmentGetAllDataTransform $dataTransform)
    {
        $this->parentDepartmentGetAllService = $parentDepartmentGetAllService;
        $this->dataTransform = $dataTransform;
    }

    public function handle()
    {
        return $this->dataTransform->transform($this->parentDepartmentGetAllService->__invoke());
    }
}