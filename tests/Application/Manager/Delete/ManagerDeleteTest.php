<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 9:26
 */

namespace App\Tests\Application\Manager\Delete;


use App\Application\Manager\Create\ManagerCreateCommand;
use App\Application\Manager\Delete\ManagerDelete;
use App\Application\Manager\Delete\ManagerDeleteCommand;
use App\Domain\Model\DeleteThing\DeleteThingRepository;
use App\Domain\Model\Manager\Exceptions\ManagerWithIdDoesntExistsException;
use App\Domain\Model\Manager\Manager;
use App\Domain\Model\Manager\ManagerRepository;
use App\Domain\Model\Role\Role;
use App\Domain\Services\Manager\ManagerDeletorService;
use PHPUnit\Framework\TestCase;


class ManagerDeleteTest extends TestCase
{
    /**
     * @var ManagerDelete
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

        $this->handle = new ManagerDelete(  new ManagerDeletorService($this->stubRepository, $this->createMock(DeleteThingRepository::class)));
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     */
    public function falla_al_encontrar_manager_cuando_intenta_delete_manager()
    {
        $this->stubRepository->method('getManagerByID')
            ->willReturn(null);

        $this->expectException(ManagerWithIdDoesntExistsException::class);

        $this->handle->handler(new ManagerDeleteCommand(2));
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     */
    public function borrado_Manager_bien()
    {
        $this->stubRepository->method('getManagerByID')
            ->willReturn(new Manager('nickName', 'name', 1, 'password','email@email.em'));

        $this->handle->handler(new ManagerDeleteCommand(2));

        $this->assertTrue(true);
    }



}
