<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 15/05/18
 * Time: 14:31
 */

namespace App\Domain\Services\Manager;


use App\Application\Manager\Delete\ManagerDeleteCommand;
use App\Domain\Model\Manager\Exceptions\ManagerWithIdDoesntExistsException;
use App\Domain\Model\Manager\ManagerRepository;
use Ramsey\Uuid\Uuid;

class ManagerDeletorService
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
     * @param ManagerDeleteCommand $manager
     * @param $id
     * @throws \Assert\AssertionFailedException
     */
    public function __invoke($id)
    {
        $oldManager = $this->repository->getManagerByID($id);

        if (empty($oldManager))
            throw new ManagerWithIdDoesntExistsException($id);

        $uuid = Uuid::uuid4();

        $oldManager->setDeleteID($uuid);

        $this->repository->update();
    }
}