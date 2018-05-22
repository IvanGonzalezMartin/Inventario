<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 10:00
 */

namespace App\Application\User\Update;


use App\Domain\Model\User\User;
use App\Domain\Services\User\UserUpdatorService;

class UserUpdate
{
    private $userCreatorService;

    public function __construct(UserUpdatorService $userCreatorService)
    {
        $this->userCreatorService = $userCreatorService;
    }

    public function handle(UserUpdateCommand $userUpdateCommand)
    {

        $user = new User(   $userUpdateCommand->uuid(),
                            $userUpdateCommand->nickName(),
                            $userUpdateCommand->surName(),
                            $userUpdateCommand->nif(),
                            $userUpdateCommand->email(),
                            $userUpdateCommand->password(),
                            $userUpdateCommand->employeeCode(),
                            $userUpdateCommand->departmentId(),
                            $userUpdateCommand->genderName()
        );

        $user->setPhoto($userUpdateCommand->photo());
        $user->setTelephone($userUpdateCommand->telephone());

        $this->userCreatorService->__invoke($user);
    }
}