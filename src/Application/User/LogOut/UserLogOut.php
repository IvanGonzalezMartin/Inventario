<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 9:29
 */

namespace App\Application\User\LogOut;

use App\Domain\Services\User\UserLogOutService;

class UserLogOut
{
    /**
     * @var UserLogOutService
     */
    private $userLogOutService;

    public function __construct(UserLogOutService $userLogOutService)
    {
        $this->userLogOutService = $userLogOutService;
    }

    public function handle(UserLogOutCommand $command)
    {
        $this->userLogOutService->__invoke($command->getToken());
    }
}