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
use App\Domain\Model\User\Exceptions\UserDoesntExistsException;
use App\Domain\Model\User\Exceptions\WrongPasswordException;
use App\Domain\Model\User\UserRepository;
use App\Domain\Services\Token\TokenGenerateWithEmail;

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
        $user = $this->repository->findByUQ($anyThing);

        if (empty($user))
            throw new UserDoesntExistsException($anyThing);

        if (false === $user->comprobPassword($password))
            throw new WrongPasswordException();

        $token = TokenGenerateWithEmail::generate($user->getEmail());

        $this->logUserRepository->logIn(new LogUser($user->getId(), $token));

        return $token;
    }
}