<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 8:57
 */

namespace App\Application\User\Delete;


use App\Domain\Services\User\UserDeletorService;

class UserDelete
{
    private $userDeletorService;

    public function __construct(UserDeletorService $userDeletorService)
    {
        $this->userDeletorService = $userDeletorService;
    }

    public function handle(UserDeleteCommand $deleteCommand)
    {
        $this->userDeletorService->__invoke($deleteCommand->uuid());
    }
}