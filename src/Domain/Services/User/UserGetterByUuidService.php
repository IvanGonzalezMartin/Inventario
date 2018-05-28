<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 13:44
 */

namespace App\Domain\Services\User;


use App\Application\User\GetByUuid\UserGetByUuidCommand;
use App\Domain\Model\User\UserRepository;

class UserGetterByUuidService
{
    /**
     * @var UserRepository
     */
    private $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function __invoke(UserGetByUuidCommand $getByUuidCommand)
    {
        return $this->repository->findByID($getByUuidCommand->id());
    }
}