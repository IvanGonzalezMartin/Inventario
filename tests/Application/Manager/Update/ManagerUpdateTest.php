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
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->stubRepository = $this->createMock(ManagerRepository::class);

        $this->handle = new ManagerUpdate(  new ManagerUpdatorService($this->stubRepository,
                                                        $this->createMock(ManagerCheckNickNameService::class),
                                                        $this->createMock(ManagerCheckEmailService::class))
                        );
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     * @throws \ReflectionException
     */
    public function falla_al_encontrar_manager_cuando_intenta_update_manager()
    {
        $this->expectException(ManagerWithIdDoesntExistsException::class);

        $this->handle->handle(new ManagerUpdateCommand('id', 'nickName','name','photo','','password','email@email.email'));
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     * @throws \ReflectionException
     */
    public function falla_al_encontrar_rol_cuando_intenta_update_manager()
    {
        $this->stubRepository->method('getManagerByID')
            ->willReturn(new Manager('nickName', 'name', Role::ADMIN, 'password', 'email@email.email'));

        $this->expectException(RolNotFoundException::class);

        $this->handle->handle(new ManagerUpdateCommand('id', 'nickName','name','photo','FAIL','password','email@email.email'));
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     * @throws \ReflectionException
     */
    public function update_manager_okay()
    {
        $this->stubRepository->method('getManagerByID')
            ->willReturn(new Manager('nickName', 'name', Role::ADMIN, 'password', 'email@email.email'));

        $this->handle->handle(new ManagerUpdateCommand('id', 'nickName','name','photo',Role::ADMIN,'password','email@email.email'));

        $this->assertTrue(true);
    }



}
