<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 9:40
 */

namespace App\Domain\Services\User;

use App\Domain\Model\LogUser\LogUserRepository;

class UserLogOutService
{
    /**
     * @var LogUserRepository
     */
    private $logUserRepository;

    public function __construct(LogUserRepository $logUserRepository)
    {
        $this->logUserRepository = $logUserRepository;
    }

    public function __invoke($token)
    {
        ($this->logUserRepository->findByToken($token))->logOut();

        $this->logUserRepository->update();

    }
}