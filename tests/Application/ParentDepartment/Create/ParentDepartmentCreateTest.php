<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 11:37
 */

namespace App\Tests\Application\ParentDepartment\Create;

use App\Application\ParentDepartment\Create\ParentDepartmentCreate;
use App\Application\ParentDepartment\Create\ParentDepartmentCreateCommand;
use App\Domain\Model\ParentDepartment\Exceptions\ParentDepartmentAlreadyExistsException;
use App\Domain\Model\ParentDepartment\ParentDepartment;
use App\Domain\Model\ParentDepartment\ParentDepartmentRepository;
use App\Domain\Services\ParentDepartment\ParentDepartmentCreatorService;
use PHPUnit\Framework\TestCase;

class ParentDepartmentCreateTest extends TestCase
{
    private $stubRepository;
    /**
     * @var ParentDepartmentCreate
     */
    private $handle;

    public function setUp()
    {
        $this->stubRepository = $this->createMock(ParentDepartmentRepository::class);
        $this->handle = new ParentDepartmentCreate(new ParentDepartmentCreatorService($this->stubRepository));
    }

    /**
     * @test
     */
    public function given_an_parentname_when_exist_then_exception()
    {
        $this->stubRepository->method('findByName')
            ->willReturn($this->createMock(ParentDepartment::class));

        $this->expectException(ParentDepartmentAlreadyExistsException::class);

        $this->handle->handler(new ParentDepartmentCreateCommand('asdasdads'));
    }

    /**
     * @test
     */
    public function given_an_parentname_when_non_exist_then_ok()
    {
        $this->stubRepository->method('findByName')
            ->willReturn(null);

        $this->handle->handler(new ParentDepartmentCreateCommand('asdasdads'));

        self::assertTrue(true);
    }

}
