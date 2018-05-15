<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 9:26
 */

namespace App\Tests\Application\Manager\CheckEmail;

use App\Application\Manager\CheckEmail\ManagerCheckEmail;
use App\Application\Manager\CheckEmail\ManagerCheckEmailCommand;
use App\Application\ParentDepartment\Create\ParentDepartmentCreateCommand;
use App\Domain\Model\Manager\Exceptions\ManagerEmailAlreadyExistsException;
use App\Domain\Model\Manager\Manager;
use App\Domain\Model\Manager\ManagerRepository;
use App\Domain\Services\Manager\ManagerCheckEmailService;
use PHPUnit\Framework\TestCase;

class ManagerCheckEmailTest extends TestCase
{
    /**
     * @var ManagerCheckEmail
     */
    private $handle;
    private $stubRepository;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->stubRepository = $this->createMock(ManagerRepository::class);
        $this->handle = new ManagerCheckEmail(new ManagerCheckEmailService($this->stubRepository));
    }

    /**
     * @test
     * @throws \ReflectionException
     */
    public function given_an_email_when_exist_then_exception()
    {
        $this->stubRepository->method('getManagerByEmail')
            ->willReturn($this->createMock(Manager::class));

        $this->expectException(ManagerEmailAlreadyExistsException::class);

        $this->handle->handler(new ManagerCheckEmailCommand('Email'));

        $this->handle->handler(new ParentDepartmentCreateCommand('dsfd'));
    }

    /**
     * @test
     */
    public function given_an_email_when_not_exist_then_okay()
    {
        $this->stubRepository->method('getManagerByEmail')
            ->willReturn(null);

        $this->handle->handler(new ManagerCheckEmailCommand('nickName'));

        self::assertTrue(true);
    }

}
