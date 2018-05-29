<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 9:08
 */

namespace App\MiddelWare\Shared;


use App\Application\Clothe\Creator\ClotheCreateCommand;
use App\Application\Clothe\Creator\ClotheCreateSecurity;
use App\Application\Clothe\Delete\ClotheDeleteCommand;
use App\Application\Clothe\Delete\ClotheDeleteSecurity;
use App\Application\Clothe\GetPart\ClotheGetPartCommand;
use App\Application\Clothe\GetPart\ClotheGetPartSecurity;
use App\Application\Clothe\Update\ClotheUpdateCommand;
use App\Application\Clothe\Update\ClotheUpdateSecurity;
use App\Application\ClotheCategory\Create\ClotheCategoryCreateCommand;
use App\Application\ClotheCategory\Create\ClotheCategoryCreateSecurity;
use App\Application\ClotheCategory\Delete\ClotheCategoryDeleteCommand;
use App\Application\ClotheCategory\Delete\ClotheCategoryDeleteSecurity;
use App\Application\ClotheCategory\GetAll\ClotheCategoryAllCommand;
use App\Application\ClotheCategory\GetAll\ClotheCategoryGetAllSecurity;
use App\Application\ClotheCategory\Update\ClotheCategoryUpdateCommand;
use App\Application\ClotheCategory\Update\ClotheCathegoryUpdateSecurity;
use App\Application\ClotheSizeStock\GetPart\ClotheSizeStockGetPartCommand;
use App\Application\ClotheSizeStock\GetPart\ClotheSizeStockGetPartSecurity;
use App\Application\ClotheSizeStock\Update\ClotheSizeStockUpdateCommand;
use App\Application\ClotheSizeStock\Update\ClotheSizeStockUpdateSecurity;
use App\Application\Contract\Create\ContractCreateCommand;
use App\Application\Contract\Create\ContractCreateSecurity;
use App\Application\Contract\GetPart\ContractGetPartCommand;
use App\Application\Contract\GetPart\ContractGetPartSecurity;
use App\Application\Contract\Update\ContractUpdateCommand;
use App\Application\Contract\Update\ContractUpdateSecurity;
use App\Application\Department\Create\DepartmentCreateCommand;
use App\Application\Department\Create\DepartmentCreateSecurity;
use App\Application\Department\Delete\DepartmentDeleteCommand;
use App\Application\Department\Delete\DepartmentDeleteSecurity;
use App\Application\Department\GetPart\DepartmentGetPartCommand;
use App\Application\Department\GetPart\DepartmentGetPartSecurity;
use App\Application\Department\Update\DepartmentUpdateCommand;
use App\Application\Gender\AllGenders\GenderAllCommand;
use App\Application\Gender\AllGenders\GenderAllSecurity;
use App\Application\OrderDetails\GetByOrderID\OrderDetailsGetByOrderIdCommand;
use App\Application\OrderDetails\GetByOrderID\OrderDetailsGetByOrderIdSecurity;
use App\Application\ParentDepartment\Update\ParentDepartmentUpdateSecurity;
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

        $factory->add(ClotheCreateCommand::class, new ClotheCreateSecurity());
        $factory->add(ClotheDeleteCommand::class, new ClotheDeleteSecurity());
        $factory->add(ClotheGetPartCommand::class, new ClotheGetPartSecurity());
        $factory->add(ClotheUpdateCommand::class, new ClotheUpdateSecurity());

        $factory->add(ClotheCategoryCreateCommand::class, new ClotheCategoryCreateSecurity());
        $factory->add(ClotheCategoryDeleteCommand::class, new ClotheCategoryDeleteSecurity());
        $factory->add(ClotheCategoryAllCommand::class, new ClotheCategoryGetAllSecurity());
        $factory->add(ClotheCategoryUpdateCommand::class, new ClotheCathegoryUpdateSecurity());

        $factory->add(ClotheSizeStockGetPartCommand::class, new ClotheSizeStockGetPartSecurity());
        $factory->add(ClotheSizeStockUpdateCommand::class, new ClotheSizeStockUpdateSecurity());

        $factory->add(ContractCreateCommand::class, new ContractCreateSecurity());
        $factory->add(ContractGetPartCommand::class, new ContractGetPartSecurity());
        $factory->add(ContractUpdateCommand::class, new ContractUpdateSecurity());

        $factory->add(DepartmentCreateCommand::class, new DepartmentCreateSecurity());
        $factory->add(DepartmentDeleteCommand::class, new DepartmentDeleteSecurity());
        $factory->add(DepartmentGetPartCommand::class, new DepartmentGetPartSecurity());
        $factory->add(DepartmentUpdateCommand::class, new ParentDepartmentUpdateSecurity());

        $factory->add(GenderAllCommand::class, new GenderAllSecurity());

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