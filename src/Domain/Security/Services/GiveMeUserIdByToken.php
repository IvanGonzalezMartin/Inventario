<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 11:44
 */

namespace App\Domain\Security\Services;


use App\Domain\Model\LogUser\LogUserRepository;
use App\Domain\Security\Exceptions\AccessDenied;
use App\Domain\Security\Exceptions\AccessDeniedTokenDied;

class GiveMeUserIdByToken
{
    /**
     * @var LogUserRepository
     */
    private $userRepository;

    public function __construct(LogUserRepository $managerRepository)
    {
        $this->userRepository = $managerRepository;
    }

    public function __invoke($acesToken)
    {
        $userToken = $this->userRepository->findByToken($acesToken);

        if (empty($userToken))
            throw new AccessDenied();

        if ($userToken->inRangeOfTime()){
            $this->userRepository->update();
            throw new AccessDeniedTokenDied();
        }

        $this->userRepository->update();

        return $userToken->getUserID();
    }
}