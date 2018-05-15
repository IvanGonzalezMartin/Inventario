<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 9:26
 */

namespace App\Tests\Application\Manager\Update;

use App\Application\Manager\Update\ManagerUpdate;
use App\Application\Manager\Update\ManagerUpdateCommand;
use App\Domain\Model\Manager\Exceptions\ManagerWithIdDoesntExistsException;
use App\Domain\Model\Manager\Manager;
use App\Domain\Model\Manager\ManagerRepository;
use App\Domain\Model\Role\Exceptions\RolNotFoundException;
use App\Domain\Model\Role\Role;
use App\Domain\Model\Role\RoleRepository;
use App\Domain\Services\Manager\ManagerCheckEmailService;
use App\Domain\Services\Manager\ManagerCheckNickNameService;
use App\Domain\Services\Manager\ManagerUpdatorService;
use PHPUnit\Framework\TestCase;


class ManagerUpdateTest extends TestCase
{
    /**
     * @var ManagerUpdate
     */
    private $handle;
    /**
     * @var ManagerRepository
     */
    private $stubRepository;

    /**
     * @var RoleRepository
     */
    private $stubRepositoryRole;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->stubRepository = $this->createMock(ManagerRepository::class);
        $this->stubRepositoryRole = $this->createMock(RoleRepository::class);

        $this->handle = new ManagerUpdate(  new ManagerUpdatorService($this->stubRepository,
                                                        $this->createMock(ManagerCheckNickNameService::class),
                                                        $this->createMock(ManagerCheckEmailService::class),
                                                        $this->stubRepositoryRole)
                        );
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     * @throws \ReflectionException
     */
    public function falla_al_encontrar_manager_cuando_intenta_update_manager()
    {
        $this->stubRepository->method('getManagerByID')
            ->willReturn(null);

        $this->expectException(ManagerWithIdDoesntExistsException::class);

        $this->handle->handler(new ManagerUpdateCommand('id', 'nickName','name','photo',1,'password','email@email.email'));
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     * @throws \ReflectionException
     */
    public function falla_al_encontrar_rol_cuando_intenta_update_manager()
    {
        $this->stubRepository->method('getManagerByID')
            ->willReturn(new Manager('nickName', 'name', 1, 'password', 'email@email.email'));

        $this->stubRepositoryRole->method('getRolById')
            ->willReturn(null);

        $this->expectException(RolNotFoundException::class);

        $this->handle->handler(new ManagerUpdateCommand('id', 'nickName','name','photo',1,'password','email@email.email'));
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     * @throws \ReflectionException
     */
    public function update_manager_okay()
    {
        $this->stubRepository->method('getManagerByID')
            ->willReturn(new Manager('nickName', 'name', 1, 'password', 'email@email.email'));

        $this->stubRepositoryRole->method('getRolById')
            ->willReturn(new Role('names'));

        $this->handle->handler(new ManagerUpdateCommand('id', 'nickName','name','photo',1,'password','email@email.email'));

        $this->assertTrue(true);
    }



}
