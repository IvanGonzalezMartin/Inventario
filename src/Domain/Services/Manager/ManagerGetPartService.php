<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 13:27
 */

namespace App\Domain\Services\Manager;


use App\Application\Manager\GetPart\ManagerGetPartCommand;
use App\Domain\Model\Manager\ManagerRepository;

class ManagerGetPartService
{
    /**
     * @var ManagerRepository
     */
    private $repository;


    public function __construct(ManagerRepository $managerRepository)
    {
        $this->repository = $managerRepository;
    }

    /**
     * @return mixed
     */
    public function __invoke(ManagerGetPartCommand $managerGetPartCommand)
    {
        return $this->repository->findById($managerGetPartCommand->id());
    }
}