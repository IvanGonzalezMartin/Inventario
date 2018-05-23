<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 9:03
 */

namespace App\Domain\Services\User;


use App\Domain\Model\Contract\ContractRepository;
use App\Domain\Model\DeleteThing\DeleteThing;
use App\Domain\Model\DeleteThing\DeleteThingRepository;
use App\Domain\Model\User\Exceptions\UserDoesntExistsException;
use App\Domain\Model\User\UserRepository;
use Ramsey\Uuid\Uuid;

class UserDeletorService
{
    /**
     * @var UserRepository
     */
    private $repository;
    /**
     * @var ContractRepository
     */
    private $contractRepository;
    /**
     * @var DeleteThingRepository
     */
    private $deleteRepository;

    /**
     * UserDeletorService constructor.
     * @param UserCheckUuidExistService $userCheckUuid
     * @param UserRepository $repository
     * @param ContractRepository $contractRepository
     * @param DeleteThingRepository $deleteRepository
     */
    public function __construct(UserRepository $repository, ContractRepository $contractRepository, DeleteThingRepository $deleteRepository)
    {
        $this->repository = $repository;
        $this->contractRepository = $contractRepository;
        $this->deleteRepository = $deleteRepository;
    }


    public function __invoke($uuidUser)
    {
        $oldUser = $this->repository->findByID($uuidUser);

        if (empty($oldUser))
            throw new UserDoesntExistsException($uuidUser);

        $contract = $this->contractRepository->findByUserId($uuidUser);

        $uuid = Uuid::uuid4();
        $oldUser->setDeleteID($uuid);

        if (false === empty($contract))
            $contract->setDeleteID($uuid);

        $this->deleteRepository->insert(new DeleteThing($uuidUser, $uuid->toString(), 'User And Contract'));
        $this->repository->update();
    }
}