<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 8:10
 */

namespace App\Application\Department\Delete;

use App\Domain\Services\Department\DepartmetDeletorService;


class DepartmentDelete
{
    private $departmentDeletorService;

    public function __construct(DepartmetDeletorService $departmentDeletorService)
    {
        $this->departmentDeletorService = $departmentDeletorService;
    }


    public function handle(DepartmentDeleteCommand $departmentDeleteCommand)
    {
        $this->departmentDeletorService->__invoke($departmentDeleteCommand->id());
    }
}