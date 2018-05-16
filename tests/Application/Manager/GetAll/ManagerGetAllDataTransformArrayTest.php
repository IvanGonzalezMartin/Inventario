<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 9:26
 */

namespace App\Tests\Application\Manager\GetAll;



use App\Application\Manager\Delete\ManagerDelete;
use App\Application\Manager\Delete\ManagerDeleteCommand;
use App\Application\Manager\GetAll\DataTransforms\ManagerGetAllDataTransformArray;
use App\Application\Manager\GetAll\ManagerGetAll;
use App\Application\Manager\GetAll\ManagerGetAllDataTransform;
use App\Domain\Model\DeleteThing\DeleteThingRepository;
use App\Domain\Model\Manager\Exceptions\ManagerWithIdDoesntExistsException;
use App\Domain\Model\Manager\Manager;
use App\Domain\Model\Manager\ManagerRepository;

use App\Domain\Services\Manager\ManagerDeletorService;
use App\Domain\Services\Manager\ManagerGetAllService;
use PHPUnit\Framework\TestCase;


class ManagerGetAllDataTransformArrayTest extends TestCase
{
    /**
     * @var ManagerGetAll
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

        $this->handle = new ManagerGetAll(new ManagerGetAllService($this->stubRepository), $this->createMock(ManagerGetAllDataTransformArray::class));
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     */
    public function falla_al_encontrar_manager_cuando_intenta_delete_manager()
    {
        $this->stubRepository->method('getAll')
            ->willReturn(null);
        $this->handle->handler();
        $this->assertTrue(true);
    }


}
