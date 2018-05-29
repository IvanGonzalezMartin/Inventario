<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 9:55
 */

namespace App\Domain\Security\Services;


use App\Domain\Model\LogManager\LogManagerRepository;
use App\Domain\Security\Exceptions\AccessDenied;
use App\Domain\Security\Exceptions\AccessDeniedTokenDied;

class AnyAuthenticatedManager
{
    /**
     * @var LogManagerRepository
     */
    private $managerRepository;

    public function __construct(LogManagerRepository $managerRepository)
    {
        $this->managerRepository = $managerRepository;
    }

    public function __invoke($acesToken)
    {
        $managerToken = $this->managerRepository->findByToken($acesToken);

        if (empty($managerToken))
            throw new AccessDenied();

        if ($managerToken->inRangeOfTime()){
            $this->managerRepository->update();
            throw new AccessDeniedTokenDied();
        }

        $this->managerRepository->update();

    }
}