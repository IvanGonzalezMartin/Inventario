<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 14:15
 */

namespace App\Domain\Services\User;


use App\Domain\Model\LogUser\LogUser;
use App\Domain\Model\LogUser\LogUserRepository;
use App\Domain\Model\User\UserRepository;

class UserLogInService
{
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * @var LogUserRepository
     */
    private $logUserRepository;

    public function __construct(UserRepository $userRepository, LogUserRepository $logUserRepository)
    {
        $this->repository = $userRepository;
        $this->logUserRepository = $logUserRepository;
    }

    public function __invoke($anyThing, $password)
    {
        return $this->repository->findByID($getByUuidCommand->id());
    }
}