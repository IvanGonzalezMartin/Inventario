<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 7/05/18
 * Time: 8:10
 */

namespace App\Tests\Application\ParentDepartment\Update;

use App\Application\ParentDepartment\Update\ParentDepartmentUpdate;
use App\Application\ParentDepartment\Update\ParentDepartmentUpdateCommand;
use App\Domain\Model\ParentDepartment\Exceptions\ParentDepartmentAlreadyExistsException;
use App\Domain\Model\ParentDepartment\Exceptions\ParentDepartmentDosentExistsException;
use App\Domain\Model\ParentDepartment\ParentDepartment;
use App\Domain\Model\ParentDepartment\ParentDepartmentRepository;
use App\Domain\Services\ParentDepartment\ParentDepartmentUpdaterService;
use PHPUnit\Framework\TestCase;

class ParentDepartmentUpdateTest extends TestCase
{
    private $stubRepository;
    /**
     * @var ParentDepartmentUpdate
     */
    private $handle;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->stubRepository = $this->createMock(ParentDepartmentRepository::class);
        $this->handle = new ParentDepartmentUpdate(new ParentDepartmentUpdaterService($this->stubRepository));
    }

    /**
     * @test
     */
    public function intentnado_hacer_un_update_comprobar_si_el_nombre_ya_existe()
    {
        $this->stubRepository->method('getParentDepartmentByID')
            ->willReturn(new ParentDepartment('sdfdfgdfgdfgcv'));

        $this->stubRepository->method('findByName')
            ->willReturn(new ParentDepartment('sdfdfgdfgdfgcv'));

        $this->expectException(ParentDepartmentAlreadyExistsException::class);

        $this->handle->handle(new ParentDepartmentUpdateCommand("1", "names"));
    }

    /**
     * @test
     */
    public function dado_un_id_comprobar_si_existe()
    {
        $this->stubRepository->method('getParentDepartmentByID')
            ->willReturn(null);

        $this->expectException(ParentDepartmentDosentExistsException::class);

        $this->handle->handle(new ParentDepartmentUpdateCommand("1", "names"));
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     */
    public function dado_un_deleteid_comprobar_si_puedes_modificar_un_departamentopadre()
    {
        $parentRepository = new ParentDepartment('sdfdfgdfgdfgcv');
        $parentRepository->setDeleteID('327f3cf6-7ac6-4dc2-bf45-817a69645b65');

        $this->stubRepository->method('getParentDepartmentByID')
            ->willReturn($parentRepository);

        $this->expectException(ParentDepartmentDosentExistsException::class);

        $this->handle->handle(new ParentDepartmentUpdateCommand("1", "names"));
    }

}