<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 10:15
 */

namespace App\Domain\Security\Services;


use App\Domain\Model\LogManager\LogManager;
use App\Domain\Model\LogManager\LogManagerRepository;
use App\Domain\Model\LogUser\LogUserRepository;
use App\Domain\Security\Exceptions\AccessDenied;


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

        //$this->managerRepository->logIn(new LogManager('o','u'));

        $userToken = $this->userRepository->findByToken($acesToken);
        $managerToken = $this->managerRepository->findByToken($acesToken);

        if (empty($userToken) && empty($managerToken))
            throw new AccessDenied();

        if (false === empty($managerToken) && $managerToken->inRangeOfTime()){
            $this->managerRepository->update();
            throw new AccessDenied();
        }

        $this->managerRepository->update();

    }
}