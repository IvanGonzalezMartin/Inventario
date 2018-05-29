<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 9:08
 */

namespace App\MiddelWare\Shared;


use App\Application\OrderDetails\GetByOrderID\OrderDetailsGetByOrderIdCommand;
use App\Application\OrderDetails\GetByOrderID\OrderDetailsGetByOrderIdSecurity;
use App\Application\User\Create\UserCreateCommand;
use App\Application\User\Create\UserCreateSecurity;
use App\Application\User\Delete\UserDeleteCommand;
use App\Application\User\Delete\UserDeleteSecurity;
use App\Application\User\Filter\UserFilterCommand;
use App\Application\User\Filter\UserFilterSecurity;
use App\Application\User\GetByUuid\UserGetByUuidCommand;
use App\Application\User\GetByUuid\UserGetByUuidSecurity;
use App\Application\User\LogIn\UserLogInCommand;
use App\Application\User\LogIn\UserLogInSecurity;
use App\Application\User\Update\UserUpdateCommand;
use App\Application\User\Update\UserUpdateSecurity;
use App\Domain\Model\LogManager\LogManagerRepository;
use App\Domain\Model\LogUser\LogUserRepository;
use App\Domain\Model\Manager\ManagerRepository;
use App\Domain\Model\User\UserRepository;
use App\Domain\Security\Services\AnyAuthenticatedUserOrManager;
use League\Tactician\Middleware;

class FillFactory implements Middleware
{

    private $logUserRepository;
    private $userRepository;
    private $logManagerRepository;
    private $managerRepository;

    /**
     * FillFactory constructor.
     * @param $logUserRepository
     * @param $userRepository
     * @param $logManagerRepository
     * @param $managerRepository
     */
    public function __construct(LogUserRepository $logUserRepository, UserRepository $userRepository, LogManagerRepository $logManagerRepository, ManagerRepository $managerRepository)
    {

        $this->logUserRepository = $logUserRepository;
        $this->userRepository = $userRepository;
        $this->logManagerRepository = $logManagerRepository;
        $this->managerRepository = $managerRepository;
    }


    /**
     * @param object $command
     * @param callable $next
     *
     * @return mixed
     */
    public function execute($command, callable $next)
    {
        $this->fillSecurity();
        $this->fillServices();
        return $next($command);
    }

    private function fillSecurity()
    {
        $factory = FactoryOfFilesSecurity::getInstance();

        $factory->add(UserUpdateCommand::class, new UserUpdateSecurity());
        $factory->add(UserLogInCommand::class, new UserLogInSecurity());
        $factory->add(UserGetByUuidCommand::class, new UserGetByUuidSecurity());
        $factory->add(UserFilterCommand::class, new UserFilterSecurity());
        $factory->add(UserDeleteCommand::class, new UserDeleteSecurity());
        $factory->add(UserCreateCommand::class, new UserCreateSecurity());




        $factory->add(OrderDetailsGetByOrderIdCommand::class, new OrderDetailsGetByOrderIdSecurity());

    }

    private function fillServices()
    {
        $factory = FactoryOfServicesSecurity::getInstance();

        $factory->add(AnyAuthenticatedUserOrManager::class, new AnyAuthenticatedUserOrManager($this->logUserRepository, $this->logManagerRepository));
    }
}