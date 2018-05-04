<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 12:56
 */

namespace App\Domain\Services\Manager;


use App\Domain\Model\Manager\Manager;
use App\Domain\Model\Manager\ManagerRepository;

class ManagerCreatorService
{
    private $repository;

    public function __construct(ManagerRepository $managerRepository)
    {
        $this->repository = $managerRepository;
    }

    public function __invoke(Manager $manager)
    {

    }
}