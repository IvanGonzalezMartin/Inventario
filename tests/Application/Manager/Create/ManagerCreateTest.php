<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 9:26
 */

namespace App\Tests\Application\Manager\Create;


use App\Application\Manager\Create\ManagerCreate;
use App\Application\Manager\Create\ManagerCreateCommand;
use App\Domain\Model\Manager\ManagerRepository;
use App\Domain\Model\Role\Exceptions\RolNotFoundException;
use App\Domain\Model\Role\Role;
use App\Domain\Model\Role\RoleRepository;
use App\Domain\Services\Manager\ManagerCheckEmailService;
use App\Domain\Services\Manager\ManagerCheckNickNameService;
use App\Domain\Services\Manager\ManagerCreatorService;
use PHPUnit\Framework\TestCase;


class ManagerCreateTest extends TestCase
{
    /**
     * @var ManagerCreate
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

        $this->handle = new ManagerCreate(  new ManagerCreatorService($this->stubRepository,
                                                        $this->createMock(ManagerCheckNickNameService::class),
                                                        $this->createMock(ManagerCheckEmailService::class))
                        );
    }

    /**
     * @test
     * @throws \ReflectionException
     */
    public function falla_al_encontrar_rol_cuando_intenta_crear_manager()
    {
        $this->expectException(RolNotFoundException::class);

        $this->handle->handle(new ManagerCreateCommand('nickName','name','photo','','password','email@email.email'));
    }

    /**
     * @test
     * @throws \ReflectionException
     */
    public function insertando_bien()
    {
        $this->handle->handle(new ManagerCreateCommand('nickName','name','photo',Role::ADMIN,'password','email@email.email'));

        $this->assertTrue(true);
    }



}
