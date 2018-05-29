<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 10:15
 */

namespace App\Domain\Security\ACL;


use App\Domain\Model\LogManager\LogManagerRepository;
use App\Domain\Model\LogUser\LogUserRepository;
use App\Domain\Security\Exceptions\AccessDenied;
use App\Domain\Security\Exceptions\AccessDeniedTokenDied;


class AnyAuthenticatedUserOrManager
{
    private $userRepository;
    private $managerRepository;

    public function __construct(LogUserRepository $userRepository, LogManagerRepository $managerRepository)
    {
        $this->userRepository = $userRepository;
        $this->managerRepository = $managerRepository;
    }

    public function __invoke($acesToken)
    {

        $userToken = $this->userRepository->findByToken($acesToken);
        $managerToken = $this->managerRepository->findByToken($acesToken);

        if (empty($userToken) && empty($managerToken))
            throw new AccessDenied();

        if (false === empty($managerToken) && $managerToken->inRangeOfTime()){
            $this->managerRepository->update();
            throw new AccessDeniedTokenDied();
        }

        if (false === empty($userToken) && $userToken->inRangeOfTime()){
            $this->userRepository->update();
            throw new AccessDeniedTokenDied();
        }

        $this->managerRepository->update();

    }
}