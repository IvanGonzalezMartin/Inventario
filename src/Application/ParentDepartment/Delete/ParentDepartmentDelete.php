<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 21/05/18
 * Time: 14:04
 */

namespace App\Application\ParentDepartment\Delete;


use App\Domain\Services\ParentDepartment\ParentDeparmentDeletorService;

class ParentDepartmentDelete
{
    private $parentDepartmentDeletorService;

    public function __construct(ParentDeparmentDeletorService $parentDepartmentDeletorService)
    {
        $this->parentDepartmentDeletorService = $parentDepartmentDeletorService;
    }


    public function handle(ParentDepartmentDeleteCommand $parentDepartmentDeleteCommand)
    {
        $this->parentDepartmentDeletorService->__invoke($parentDepartmentDeleteCommand->id());
    }
}