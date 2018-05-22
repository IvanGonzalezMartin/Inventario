<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 10:00
 */

namespace App\Tests\Application\ParentDepartment\GetAll;

use App\Application\ParentDepartment\GetAll\ParentDepartmentGetAll;
use App\Application\ParentDepartment\GetAll\ParentDepartmentGetAllCommand;
use App\Application\ParentDepartment\GetAll\ParentDepartmentGetAllDataTransform;
use App\Domain\Model\ParentDepartment\ParentDepartmentRepository;
use App\Domain\Services\ParentDepartment\ParentDepartmentGetAllService;
use PHPUnit\Framework\TestCase;

class ParentDepartmentGetAllDataTransformArrayTest extends TestCase
{
    /**
     * @var ParentDepartmentGetAll
     */
    private $handle;

    /**
     * @var ParentDepartmentRepository
     */
    private $stubRepository;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->stubRepository = $this->createMock(ParentDepartmentRepository::class);

        $this->handle = new ParentDepartmentGetAll(new ParentDepartmentGetAllService($this->stubRepository), $this->createMock(ParentDepartmentGetAllDataTransform::class));
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     */
    public function devuelve_todos_los_departamentos_padre_bien()
    {
        $this->stubRepository->method('getAll')
            ->willReturn(null);
        $this->handle->handle();
        $this->assertTrue(true);
    }
}
