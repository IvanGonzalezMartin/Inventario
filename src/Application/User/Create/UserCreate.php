<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 10:00
 */

namespace App\Application\User\Create;


use App\Domain\Model\User\User;
use App\Domain\Services\User\UserCreatorService;

class UserCreate
{
    private $userCreatorService;

    public function __construct(UserCreatorService $userCreatorService)
    {
        $this->userCreatorService = $userCreatorService;
    }

    public function handle(UserCreateCommand $userCreateCommand)
    {
        $user = new User(   $userCreateCommand->uuid(),
                            $userCreateCommand->nickName(),
                            $userCreateCommand->surName(),
                            $userCreateCommand->nif(),
                            $userCreateCommand->email(),
                            $userCreateCommand->password(),
                            $userCreateCommand->employeeCode(),
                            $userCreateCommand->departmentId(),
                            $userCreateCommand->genderName()
        );

        $user->setPhoto($userCreateCommand->photo());
        $user->setTelephone($userCreateCommand->telephone());

        $this->userCreatorService->__invoke($user);
    }
}