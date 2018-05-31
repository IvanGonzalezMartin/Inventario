<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 9:55
 */

namespace App\Domain\Security\ACL;


use App\Domain\Model\LogManager\LogManagerRepository;
use App\Domain\Model\LogUser\LogUserRepository;
use App\Domain\Model\User\UserRepository;
use App\Domain\Security\Exceptions\AccessDenied;
use App\Domain\Security\Exceptions\AccessDeniedTokenDied;

class OnlyTheCurrentUserOrManager
{
    /**
     * @var LogManagerRepository
     */
    private $managerRepository;

    /**
     * @var LogUserRepository
     */
    private $logUserRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(
        LogManagerRepository $managerRepository,
        LogUserRepository $logUserRepository,
        UserRepository $userRepository
    )
    {
        $this->managerRepository = $managerRepository;
        $this->logUserRepository = $logUserRepository;
        $this->userRepository = $userRepository;
    }

    public function __invoke($accessToken, $uuid)
    {
        $managerToken = $this->managerRepository->findByToken($accessToken);

        if (empty($managerToken)){

            $userToken = $this->logUserRepository->findByToken($accessToken);

            if (empty($userToken))
                throw new AccessDenied();

            if ($userToken->inRangeOfTime()){
                $this->logUserRepository->update();
                throw new AccessDeniedTokenDied();
            }

            $user = $this->userRepository->findByID($uuid);

            if (empty($user))
                return false;

            if ($user->getId() !== $userToken->getUserID())
                throw new AccessDenied();

        } else if ($managerToken->inRangeOfTime()){
            $this->managerRepository->update();
            throw new AccessDeniedTokenDied();
        }

        $this->managerRepository->update();

    }
}