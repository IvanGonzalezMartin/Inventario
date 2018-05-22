<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 10:17
 */

namespace App\Domain\Services\User;


use App\Domain\Model\User\Exceptions\UserAlreadyExistsException;
use App\Domain\Model\User\UserRepository;

class UserCheckUuidExistService
{
    private $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function __invoke($uuid)
    {
        if (false == empty($this->repository->findByID($uuid)))
            throw new UserAlreadyExistsException($uuid);
    }
}