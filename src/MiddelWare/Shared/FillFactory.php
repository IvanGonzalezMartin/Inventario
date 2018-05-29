<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 9:08
 */

namespace App\MiddelWare\Shared;


use App\Application\OrderDetails\GetByOrderID\OrderDetailsGetByOrderIdCommand;
use App\Application\OrderDetails\GetByOrderID\OrderDetailsSecurity;
use App\Application\User\Filter\UserFilterCommand;
use App\Application\User\Filter\UserFilterSecurity;
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

        $factory->add(UserFilterCommand::class, new UserFilterSecurity());
        $factory->add(OrderDetailsGetByOrderIdCommand::class, new OrderDetailsSecurity());
    }

    private function fillServices()
    {
        $factory = FactoryOfServicesSecurity::getInstance();

        $factory->add(AnyAuthenticatedUserOrManager::class, new AnyAuthenticatedUserOrManager($this->logUserRepository, $this->logManagerRepository));
    }
}