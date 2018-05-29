<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 9:55
 */

namespace App\Domain\Security\ACL;


use App\Domain\Model\LogManager\LogManagerRepository;
use App\Domain\Model\Manager\ManagerRepository;
use App\Domain\Model\Role\Role;
use App\Domain\Security\Exceptions\AccessDenied;
use App\Domain\Security\Exceptions\AccessDeniedNotAdminRole;
use App\Domain\Security\Exceptions\AccessDeniedTokenDied;

class AnyAuthenticatedManagerAdmin
{
    /**
     * @var LogManagerRepository
     */
    private $logManagerRepository;

    /**
     * @var ManagerRepository
     */
    private $managerRepository;

    public function __construct(LogManagerRepository $logManagerRepository, ManagerRepository $managerRepository)
    {
        $this->logManagerRepository = $logManagerRepository;
        $this->managerRepository = $managerRepository;
    }

    public function __invoke($acesToken)
    {
        $managerToken = $this->logManagerRepository->findByToken($acesToken);

        if (empty($managerToken))
            throw new AccessDenied();

        if ($managerToken->inRangeOfTime()){
            $this->logManagerRepository->update();
            throw new AccessDeniedTokenDied();
        }

        $this->logManagerRepository->update();

        $manager = $this->managerRepository->findById($managerToken->getManagerID());

        if (Role::ADMIN !== $manager->getRol())
            throw new AccessDeniedNotAdminRole();

    }
}