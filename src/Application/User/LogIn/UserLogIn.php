<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 14:27
 */

namespace App\Application\User\LogIn;


use App\Domain\Services\User\UserLogInService;

class UserLogIn
{
    /**
     * @var UserLogInService
     */
    private $logInService;
    /**
     * @var UserLogInDataTransform
     */
    private $dataTransform;

    public function __construct(UserLogInService $logInService, UserLogInDataTransform $dataTransform)
    {
        $this->logInService = $logInService;
        $this->dataTransform = $dataTransform;
    }

    public function handle(UserLogInCommand $command)
    {
        return $this->dataTransform->transform($this->logInService->__invoke($command->anyThing(), $command->password()));
    }
}