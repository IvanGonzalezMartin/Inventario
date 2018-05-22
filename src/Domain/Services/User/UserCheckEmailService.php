<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 10:17
 */

namespace App\Domain\Services\User;


use App\Domain\Model\User\Exceptions\UserEmailAlreadyExistsException;
use App\Domain\Model\User\UserRepository;

class UserCheckEmailService
{
    private $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function __invoke($email)
    {
        if (false == empty($this->repository->findByEmail($email)))
            throw new UserEmailAlreadyExistsException($email);
    }
}