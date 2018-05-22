<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 8:52
 */

namespace App\Tests\Application\Department\Delete;

use App\Application\Department\Delete\DepartmentDelete;
use App\Application\Department\Delete\DepartmentDeleteCommand;
use App\Domain\Model\DeleteThing\DeleteThingRepository;
use App\Domain\Model\Department\Department;
use App\Domain\Model\Department\DepartmentRepository;
use App\Domain\Model\Department\Exceptions\DepartmentDoesntExistException;
use App\Domain\Model\Department\Exceptions\DepartmentHaveUsersException;
use App\Domain\Model\User\User;
use App\Domain\Model\User\UserRepository;
use App\Domain\Services\Department\DepartmetDeletorService;
use PHPUnit\Framework\TestCase;

class DepartmentDeleteTest extends TestCase
{
    /**
     * @var UserRepository
     */
    private $stubUserRepository;
    private $stubRepository;
    /**
     * @var DepartmentDelete
     */
    private $handle;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->stubRepository = $this->createMock(DepartmentRepository::class);
        $this->stubUserRepository = $this->createMock(UserRepository::class);
        $stubDeleteRepository = $this->createMock(DeleteThingRepository::class);

        $this->handle = new DepartmentDelete(new DepartmetDeletorService(   $this->stubRepository,
                                                                            $stubDeleteRepository,
                                                                            $this->stubUserRepository));
    }
    
    /**
     * @test
     */
    public function dado_un_id_comprobar_si_existe_el_departamento()
    {
        $this->stubRepository->method('findById')
            ->willReturn(null);
        
        $this->expectException(DepartmentDoesntExistException::class);
        
        $this->handle->handle(new DepartmentDeleteCommand(1));
    }

    /**
     * @test
     */
    public function dado_un_id_comprobar_que_un_usuario_tiene_un_departamento_asociado()
    {
        $this->stubRepository->method('findById')
            ->willReturn(new Department(1,"names"));

        $this->stubUserRepository->method('findById')
            ->willReturn(new User('c82caa83-2fce-4d83-9ff2-bf05f72f3f20','names','',"names","names","names","names",1,"names"));

        $this->expectException(DepartmentHaveUsersException::class);

        $this->handle->handle(new DepartmentDeleteCommand(1));
    }

    /**
     * @test
     */
    public function comprobar_que_haga_el_delete()
    {
        $this->stubRepository->method('findById')
            ->willReturn(new Department(2,"names"));

        $this->stubUserRepository->method('findById')
            ->willReturn(null);

        $this->handle->handle(new DepartmentDeleteCommand(2));

        $this->assertTrue(true);
    }
}
