<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 10:17
 */

namespace App\Domain\Services\User;


use App\Domain\Model\User\Exceptions\UserNickNameAlreadyExistsException;
use App\Domain\Model\User\UserRepository;

class UserCheckNickNameService
{
    private $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function __invoke($nickName)
    {
        if (false == empty($this->repository->findByNickName($nickName)))
            throw new UserNickNameAlreadyExistsException($nickName);
    }
}