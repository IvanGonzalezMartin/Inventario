<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 12:21
 */

namespace App\Tests\Application\Order\Create;

use App\Application\Order\Create\OrderCreate;
use App\Application\Order\Create\OrderCreateCommand;
use App\Domain\Model\Order\OrderClothe;
use App\Domain\Model\Order\OrderRepository;
use App\Domain\Model\User\Exceptions\UserDoesntExistsException;
use App\Domain\Model\User\User;
use App\Domain\Model\User\UserRepository;
use App\Domain\Services\Order\OrderCreatorService;
use App\Domain\Services\OrderDetails\OrderDetailsCreatorService;
use PHPUnit\Framework\TestCase;

class OrderCreateTest extends TestCase
{
    /**
     * @var OrderCreate
     */
    private $handle;

    /**
     * @var OrderRepository
     */
    private $stubRepository;

    /**
     * @var UserRepository
     */
    private $stubUserRepository;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->stubUserRepository = $this->createMock(UserRepository::class);

        $this->stubRepository = $this->createMock(OrderRepository::class);

        $this->handle = new OrderCreate(new OrderCreatorService($this->stubRepository, $this->stubUserRepository, $this->createMock(OrderDetailsCreatorService::class)));
    }

    /**
     * @test
     */
    public function dado_un_id_comprobar_si_existe_lanzar_error()
    {
        $this->stubUserRepository->method('findById')
            ->willReturn(null);

        $this->expectException(UserDoesntExistsException::class);

        $this->handle->handle(new OrderCreateCommand('cc639e53-182b-465e-8e4f-8308c8be3b02',''));
    }

    /**
     * @test
     */
    public function comprobar_si_inserta_un_pedido()
    {
        $this->stubRepository->method('findById')
            ->willReturn(new OrderClothe('cc639e53-182b-465e-8e4f-8308c8be3b02','cc639e53-182b-465e-8e4f-8308c8be3b02'));

        $this->stubUserRepository->method('findById')
            ->willReturn(new User('cc639e53-182b-465e-8e4f-8308c8be3b02','','','','','','','',''));

        $this->handle->handle(new OrderCreateCommand('cc639e53-182b-465e-8e4f-8308c8be3b02',''));

        $this->assertTrue(true);
    }

}
