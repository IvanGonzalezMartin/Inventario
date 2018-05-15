<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 15/05/18
 * Time: 8:58
 */

namespace App\Application\ClotheCategory\Update;


use App\Domain\Services\ClotheCategory\ClotheCategoryUpdaterService;

class ClotheCategoryUpdate
{
    private $repository;

    public function __construct(ClotheCategoryUpdaterService $clotheCategoryUpdaterService)
    {
        $this->repository = $clotheCategoryUpdaterService;
    }

    public function handler(ClotheCategoryUpdateCommand $DepartmentUpdateCommand)
    {
        $id = $DepartmentUpdateCommand->id();
        $name = $DepartmentUpdateCommand->name();

        $this->repository->__invoke($id , $name);
    }
}