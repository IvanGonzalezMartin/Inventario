<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 10:17
 */

namespace App\Domain\Services\User;

use App\Domain\Model\User\Exceptions\UserNifAlreadyExistsException;
use App\Domain\Model\User\UserRepository;

class UserCheckNifService
{
    private $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function __invoke($nif)
    {
        if (false == empty($this->repository->findByNif($nif)))
            throw new UserNifAlreadyExistsException($nif);
    }
}