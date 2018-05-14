<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 14/05/18
 * Time: 9:03
 */

namespace App\Tests\Application\Department\Create;

use App\Application\Department\Create\DepartmentCreate;
use App\Application\Department\Create\DepartmentCreateCommand;
use App\Domain\Model\Department\Department;
use App\Domain\Model\Department\DepartmentRepository;
use App\Domain\Model\Department\Exceptions\DepartmentAlreadyExistsException;
use App\Domain\Model\Department\Exceptions\ParentDepartmentDoesntExistException;
use App\Domain\Model\ParentDepartment\ParentDepartment;
use App\Domain\Model\ParentDepartment\ParentDepartmentRepository;
use App\Domain\Services\Department\DepartmentCreator;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class DepartmentCreateTest extends TestCase
{
    private $stubRepository;
    private $stubParentRepository;
    /**
     * @var DepartmentCreate
     */
    private $creator;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->stubRepository = $this->createMock(DepartmentRepository::class);
        $this->stubParentRepository = $this->createMock(ParentDepartmentRepository::class);
        $this->creator = new DepartmentCreate(new DepartmentCreator( $this->stubParentRepository,$this->stubRepository));
    }

    /**
     * @test
     */
    public function dado_un_departamento_padre_id_este_no_existe()
    {
        $this->stubParentRepository->method('getParentDepartmentByID')
            ->willReturn(null);

        $this->expectException(ParentDepartmentDoesntExistException::class);

        $this->creator->handler(new DepartmentCreateCommand(5, 'asdasdads'));
    }

    /**
     * @test
     */
    public function dado_un_nombre_que_ya_existe_tira_excepcion()
    {
        $this->stubParentRepository->method('getParentDepartmentByID')
            ->willReturn(new ParentDepartment("asdasdasd"));

        $this->stubRepository->method('findByName')
            ->willReturn(new Department('1', 'asdasdasd'));

        $this->expectException(DepartmentAlreadyExistsException::class);

        $this->creator->handler(new DepartmentCreateCommand(1, 'asdasdasd'));
    }

    /**
     * @test
     */
    public function dado_un_departamento_crearlo_inserta_bien()
    {
        $this->stubParentRepository->method('getParentDepartmentByID')
            ->willReturn(new ParentDepartment("asdasdasd"));

        $this->stubRepository->method('findByName')
            ->willReturn(null);

        $this->creator->handler(new DepartmentCreateCommand(1, 'asdasdasd'));

        Assert::assertTrue(true);

    }
}
