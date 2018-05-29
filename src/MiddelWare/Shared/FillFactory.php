<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 9:08
 */

namespace App\MiddelWare\Shared;


use App\Application\Manager\CheckEmail\ManagerCheckEmailCommand;
use App\Application\Manager\CheckEmail\ManagerCheckEmailSecurity;
use App\Application\Manager\CheckNickName\ManagerCheckNickNameCommand;
use App\Application\Manager\CheckNickName\ManagerCheckNickNameSecurity;
use App\Application\Manager\Create\ManagerCreateCommand;
use App\Application\Manager\Create\ManagerCreateSecurity;
use App\Application\Manager\Delete\ManagerDeleteCommand;
use App\Application\Manager\Delete\ManagerDeleteSecurity;
use App\Application\Manager\GetAll\ManagerGetAllCommand;
use App\Application\Manager\GetAll\ManagerGetAllSecurity;
use App\Application\Manager\GetPart\ManagerGetPartCommand;
use App\Application\Manager\GetPart\ManagerGetPartSecurity;
use App\Application\Manager\Update\ManagerUpdateCommand;
use App\Application\Manager\Update\ManagerUpdateSecurity;
use App\Application\Order\Create\OrderCreateCommand;
use App\Application\Order\Create\OrderCreateSecurity;
use App\Application\Order\Delete\OrderClotheDeleteCommand;
use App\Application\Order\Delete\OrderClotheDeleteSecurity;
use App\Application\Order\GetAll\OrderClotheGetAllCommand;
use App\Application\Order\GetAll\OrderClotheGetAllSecurity;
use App\Application\Order\GetByUserID\OrderClotheGetByUserIdCommand;
use App\Application\Order\GetByUserID\OrderClotheGetByUserIdSecurity;
use App\Application\OrderDetails\GetByOrderID\OrderDetailsGetByOrderIdCommand;
use App\Application\OrderDetails\GetByOrderID\OrderDetailsGetByOrderIdSecurity;
use App\Application\ParentDepartment\Create\ParentDepartmentCreateCommand;
use App\Application\ParentDepartment\Create\ParentDepartmentCreateSecurity;
use App\Application\ParentDepartment\Delete\ParentDepartmentDeleteCommand;
use App\Application\ParentDepartment\Delete\ParentDepartmentDeleteSecurity;
use App\Application\ParentDepartment\GetAll\ParentDepartmentGetAllCommand;
use App\Application\ParentDepartment\GetAll\ParentDepartmentGetAllSecurity;
use App\Application\ParentDepartment\Update\ParentDepartmentUpdateCommand;
use App\Application\ParentDepartment\Update\ParentDepartmentUpdateSecurity;
use App\Application\Role\AllRoles\RoleAllCommand;
use App\Application\Role\AllRoles\RoleAllSecurity;
use App\Application\Sizes\SizePartCommand;
use App\Application\Sizes\SizePartSecurity;
use App\Application\SizeType\AllSizeType\SizeTypeAllCommand;
use App\Application\SizeType\AllSizeType\SizeTypeAllSecurity;
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

        $factory->add(SizeTypeAllCommand::class, new SizeTypeAllSecurity());

        $factory->add(SizePartCommand::class, new SizePartSecurity());

        $factory->add(RoleAllCommand::class, new RoleAllSecurity());

        $factory->add(ParentDepartmentUpdateCommand::class, new ParentDepartmentUpdateSecurity());
        $factory->add(ParentDepartmentGetAllCommand::class, new ParentDepartmentGetAllSecurity());
        $factory->add(ParentDepartmentDeleteCommand::class, new ParentDepartmentDeleteSecurity());
        $factory->add(ParentDepartmentCreateCommand::class, new ParentDepartmentCreateSecurity());

        $factory->add(OrderDetailsGetByOrderIdCommand::class, new OrderDetailsGetByOrderIdSecurity());

        $factory->add(OrderClotheGetByUserIdCommand::class, new OrderClotheGetByUserIdSecurity());
        $factory->add(OrderClotheGetAllCommand::class, new OrderClotheGetAllSecurity());
        $factory->add(OrderClotheDeleteCommand::class, new OrderClotheDeleteSecurity());
        $factory->add(OrderCreateCommand::class, new OrderCreateSecurity());

        $factory->add(ManagerUpdateCommand::class, new ManagerUpdateSecurity());
        $factory->add(ManagerGetPartCommand::class, new ManagerGetPartSecurity());
        $factory->add(ManagerGetAllCommand::class, new ManagerGetAllSecurity());
        $factory->add(ManagerDeleteCommand::class, new ManagerDeleteSecurity());
        $factory->add(ManagerCreateCommand::class, new ManagerCreateSecurity());
        $factory->add(ManagerCheckNickNameCommand::class, new ManagerCheckNickNameSecurity());
        $factory->add(ManagerCheckEmailCommand::class, new ManagerCheckEmailSecurity());


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

    }

    private function fillServices()
    {
        $factory = FactoryOfServicesSecurity::getInstance();

        $factory->add(AnyAuthenticatedUserOrManager::class, new AnyAuthenticatedUserOrManager($this->logUserRepository, $this->logManagerRepository));
    }
}