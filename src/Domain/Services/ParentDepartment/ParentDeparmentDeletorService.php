<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 21/05/18
 * Time: 14:01
 */

namespace App\Domain\Services\ParentDepartment;


use App\Domain\Model\DeleteThing\DeleteThingRepository;
use App\Domain\Model\ParentDepartment\ParentDepartmentRepository;

class ParentDeparmentDeletorService
{

    private $repository;

    /**
     * @var DeleteThingRepository
     */
    private $deleteThingRepository;


    public function __construct(ParentDepartmentRepository $parentDepartmentRepository, DeleteThingRepository $deleteThingRepository)
    {
        $this->repository = $parentDepartmentRepository;
        $this->deleteThingRepository = $deleteThingRepository;
    }


    public function __invoke($id)
    {

    }
}