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
use App\Domain\Services\Department\DepartmentUpdaterService;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class DepartmentUpdateTest extends TestCase
{
    private $stubRepository;
    /**
     * @var DepartmentUpdate
     */
    private $handle;

    public function setUp()
    {
        $this->stubRepository = $this->createMock(DepartmentRepository::class);
        $this->handle = new DepartmentUpdate(new DepartmentUpdaterService($this->stubRepository));
    }

    /**
     * @test
     */
    public function dado_un_id_que_no_existe_soltar_error()
    {
        $this->stubRepository->method('findById')
            ->willReturn(null);

        $this->expectException(DepartmentDoesntExistException::class);

        $this->handle->handler(new DepartmentUpdateCommand("1", "asd"));
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     */
    public function daod_un_departamento_borrado_lanzar_error()
    {
        $departmentRepository = new Department('1','adsads');
        $departmentRepository->setDeleteID('ecd76647-b59f-4869-9578-085bc72d1634');

        $this->stubRepository->method('findById')
            ->willReturn($departmentRepository);

        $this->expectException(DepartmentDoesntExistException::class);

        $this->handle->handler(new DepartmentUpdateCommand("1", "asd"));
    }

    /**
     * @test
     */
    public function dado_un_nombre_que_ya_esta_en_la_base_de_datos_lanzar_error()
    {
        $this->stubRepository->method('findById')
            ->willReturn(new Department("1","aaaaa"));

        $this->stubRepository->method('findByName')
            ->willReturn(new Department("1","aaaaa"));

        $this->expectException(DepartmentAlreadyExistsException::class);

        $this->handle->handler(new DepartmentUpdateCommand("1","asdfg"));
    }

    /**
     * @test
     */
    public function comprobar_si_se_modifica_bien_un_departamento()
    {
        $this->stubRepository->method('findById')
            ->willReturn(new Department("1","asdfg"));


        $this->handle->handler(new DepartmentUpdateCommand(1, 'asdasdasd'));

        Assert::assertTrue(true);
    }
}
