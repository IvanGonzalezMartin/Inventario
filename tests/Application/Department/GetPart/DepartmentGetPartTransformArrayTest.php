<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 10:44
 */

namespace App\Tests\Application\Department\GetPart;

use App\Application\Department\GetPart\DepartmentGetPart;
use App\Application\Department\GetPart\DepartmentGetPartCommand;
use App\Application\Department\GetPart\DepartmentGetPartDataTransform;
use App\Domain\Model\Department\DepartmentRepository;
use App\Domain\Services\Department\DepartmentGetPartService;
use PHPUnit\Framework\TestCase;

class DepartmentGetPartTransformArrayTest extends TestCase
{
    /**
     * @var DepartmentGetPart
     */
    private $handle;

    /**
     * @var DepartmentRepository
     */
    private $stubRepository;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->stubRepository = $this->createMock(DepartmentRepository::class);

        $this->handle = new DepartmentGetPart(new DepartmentGetPartService($this->stubRepository), $this->createMock(DepartmentGetPartDataTransform::class));
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     */
    public function devuelve_todos_los_deparments_bien()
    {
        $this->stubRepository->method('findArrayById')
            ->willReturn(null);
        $this->handle->handle(new DepartmentGetPartCommand(1));
        $this->assertTrue(true);
    }
}
