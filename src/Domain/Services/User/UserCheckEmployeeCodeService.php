<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 10:17
 */

namespace App\Domain\Services\User;


use App\Domain\Model\User\Exceptions\UserEmployeeCodeAlreadyExistsException;
use App\Domain\Model\User\UserRepository;

class UserCheckEmployeeCodeService
{
    private $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function __invoke($employeeCode)
    {
        if (false == empty($this->repository->findByEmployeeCode($employeeCode)))
            throw new UserEmployeeCodeAlreadyExistsException($employeeCode);
    }
}