<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 16/05/18
 * Time: 10:40
 */

namespace App\Domain\Services\Manager;


use App\Domain\Model\Manager\ManagerRepository;

class ManagerGetAllService
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
    public function __invoke()
    {
        return $this->repository->getAll();
    }
}