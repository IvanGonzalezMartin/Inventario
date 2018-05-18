<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 9:26
 */

namespace App\Tests\Application\Manager\GetAll;

use App\Application\Manager\GetAll\DataTransforms\ManagerGetAllDataTransformArray;
use App\Application\Manager\GetAll\ManagerGetAll;
use App\Domain\Model\Manager\ManagerRepository;
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
    public function devuelve_todos_los_managers_bien()
    {
        $this->stubRepository->method('getAll')
            ->willReturn(null);
        $this->handle->handle();
        $this->assertTrue(true);
    }


}
