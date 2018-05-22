<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 10:17
 */

namespace App\Application\Department\GetPart;


use App\Domain\Services\Department\DepartmentGetPartService;

class DepartmentGetPart
{
    private $departmentGetPartService;
    private $dataTransform;

    public function __construct(DepartmentGetPartService $departmentGetPartService, DepartmentGetPartDataTransform$dataTransform)
    {
        $this->departmentGetPartService = $departmentGetPartService;
        $this->dataTransform = $dataTransform;
    }

    public function handle(DepartmentGetPartCommand $departmentGetPartCommand)
    {
        return $this->dataTransform->transform($this->departmentGetPartService->__invoke($departmentGetPartCommand->id()));
    }
}