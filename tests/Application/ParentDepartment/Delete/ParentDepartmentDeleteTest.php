<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 21/05/18
 * Time: 14:51
 */

namespace App\Tests\Application\ParentDepartment\Delete;

use App\Application\ParentDepartment\Delete\ParentDepartmentDelete;
use App\Application\ParentDepartment\Delete\ParentDepartmentDeleteCommand;
use App\Domain\Model\DeleteThing\DeleteThingRepository;
use App\Domain\Model\Department\Department;
use App\Domain\Model\Department\DepartmentRepository;
use App\Domain\Model\ParentDepartment\Exceptions\ParentDepartmentDosentExistsException;
use App\Domain\Model\ParentDepartment\Exceptions\ParentDepartmentHaveDepartmentsException;
use App\Domain\Model\ParentDepartment\ParentDepartment;
use App\Domain\Model\ParentDepartment\ParentDepartmentRepository;
use App\Domain\Services\ParentDepartment\ParentDeparmentDeletorService;
use PHPUnit\Framework\TestCase;

class ParentDepartmentDeleteTest extends TestCase
{

    private $stubDepartmentRepository;
    private $stubRepository;
    /**
     * @var ParentDepartmentDelete
     */
    private $handle;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->stubRepository = $this->createMock(ParentDepartmentRepository::class);
        $this->stubDepartmentRepository = $this->createMock(DepartmentRepository::class);
        $stubDeleteRepository = $this->createMock(DeleteThingRepository::class);

        $this->handle = new ParentDepartmentDelete(new ParentDeparmentDeletorService(   $this->stubRepository,
                                                                                        $this->stubDepartmentRepository,
                                                                                        $stubDeleteRepository));
    }

    /**
     * @test
     */
    public function dado_un_id_comprobar_que_exista()
    {
        $this->stubRepository->method('findById')
            ->willReturn(null);

        $this->expectException(ParentDepartmentDosentExistsException::class);

        $this->handle->handle(new ParentDepartmentDeleteCommand(1));
    }

    /**
     * @test
     */
    public function dado_un_id_comprobar_que_el_departmaneto_padre_tiene_departamentos()
    {
        $this->stubRepository->method('findById')
            ->willReturn(new ParentDepartment("names"));

        $this->stubDepartmentRepository->method('findByParentDepartment')
            ->willReturn(new Department(1,'names'));

        $this->expectException(ParentDepartmentHaveDepartmentsException::class);

        $this->handle->handle(new ParentDepartmentDeleteCommand(1));
    }

    /**
     * @test
     */
    public function comprobar_que_haga_el_delete()
    {
        $this->stubRepository->method('findById')
            ->willReturn(new ParentDepartment("names"));

        $this->stubDepartmentRepository->method('findByParentDepartment')
            ->willReturn(null);

        $this->handle->handle(new ParentDepartmentDeleteCommand(1));

        $this->assertTrue(true);
    }
}
