<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 14/05/18
 * Time: 12:10
 */

namespace App\Tests\Application\Department\Update;

use App\Application\Department\Update\DepartmentUpdate;
use App\Application\Department\Update\DepartmentUpdateCommand;
use App\Domain\Model\Department\Department;
use App\Domain\Model\Department\DepartmentRepository;
use App\Domain\Model\Department\Exceptions\DepartmentAlreadyExistsException;
use App\Domain\Model\Department\Exceptions\DepartmentDoesntExistException;
use App\Domain\Model\ParentDepartment\Exceptions\ParentDepartmentDosentExistsException;
use App\Domain\Model\ParentDepartment\ParentDepartment;
use App\Domain\Model\ParentDepartment\ParentDepartmentRepository;
use App\Domain\Services\Department\DepartmentUpdaterService;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class DepartmentUpdateTest extends TestCase
{
    private $stubRepository;
    private $stubParentRepository;
    /**
     * @var DepartmentUpdate
     */
    private $handle;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->stubRepository = $this->createMock(DepartmentRepository::class);
        $this->stubParentRepository = $this->createMock(ParentDepartmentRepository::class);
        $this->handle = new DepartmentUpdate(new DepartmentUpdaterService($this->stubRepository, $this->stubParentRepository));
    }

    /**
     * @test
     */
    public function dado_un_id_que_no_existe_soltar_error()
    {
        $this->stubRepository->method('findById')
            ->willReturn(null);

        $this->expectException(DepartmentDoesntExistException::class);

        $this->handle->handle(new DepartmentUpdateCommand('2', 1,'names'));
    }

    /**
     * @test
     */
    public function dado_un_nombre_distinto_al_anterior_comprobar_si_ya_existe()
    {
        $departmentVar = new Department("1","namess");

        $this->stubRepository->method('findById')
            ->willReturn($departmentVar);

        $this->stubRepository->method('findByName')
            ->willReturn(new Department("1","names"));

        $this->expectException(DepartmentAlreadyExistsException::class);

        $this->handle->handle(new DepartmentUpdateCommand('2',1,'names'));
    }

    /**
     * @test
     */
    public function dado_un_departamento_padre_comprobar_si_existe()
    {
        $this->stubRepository->method('findById')
            ->willReturn(new Department(1,'names'));

        $this->stubParentRepository->method('getParentDepartmentByID')
            ->willReturn(null);

        $this->expectException(ParentDepartmentDosentExistsException::class);

        $this->handle->handle(new DepartmentUpdateCommand(1,1,'names'));
    }

    /**
     * @test
     */
    public function comprobar_si_hace_update()
    {
        $this->stubRepository->method('findById')
            ->willReturn(new Department(1,'names'));

        $this->stubParentRepository->method('getParentDepartmentByID')
            ->willReturn(new ParentDepartment("names"));

        $this->handle->handle(new DepartmentUpdateCommand(1,1,'names'));

        Assert::assertTrue(true);
    }
}
