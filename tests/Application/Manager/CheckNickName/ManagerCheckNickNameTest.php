<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 4/05/18
 * Time: 9:26
 */

namespace App\Tests\Application\Manager\CheckNickName;

use App\Application\Manager\CheckNickName\ManagerCheckNickName;
use App\Application\Manager\CheckNickName\ManagerCheckNickNameCommand;
use App\Domain\Model\Manager\Exceptions\ManagerNickNameAlreadyExistsException;
use App\Domain\Model\Manager\Manager;
use App\Domain\Model\Manager\ManagerRepository;
use App\Domain\Services\Manager\ManagerCheckNickNameService;
use PHPUnit\Framework\TestCase;

class ManagerCheckEmailTest extends TestCase
{
    /**
     * @var ManagerCheckNickName
     */
    private $handle;
    private $stubRepository;


    public function setUp()
    {
        $this->stubRepository = $this->createMock(ManagerRepository::class);
        $this->handle = new ManagerCheckNickName(new ManagerCheckNickNameService($this->stubRepository));
    }

    /**
     * @test
     */
    public function given_an_nickname_when_exist_then_exception()
    {
        $this->stubRepository->method('getManagerByName')
            ->willReturn($this->createMock(Manager::class));

        $this->expectException(ManagerNickNameAlreadyExistsException::class);

        $this->handle->handler(new ManagerCheckNickNameCommand('dsfd'));
    }

    /**
     * @test
     */
    public function given_an_nickname_when_not_exist_then_okay()
    {
        $this->stubRepository->method('getManagerByEmail')
            ->willReturn(null);

        $this->handle->handler(new ManagerCheckNickNameCommand('dsfd'));

        self::assertTrue(true);
    }

}
