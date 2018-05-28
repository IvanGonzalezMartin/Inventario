<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 12:42
 */

namespace App\Tests\Application\Order\Delete;

use App\Application\Order\Delete\OrderClotheDelete;
use App\Application\Order\Delete\OrderClotheDeleteCommand;
use App\Domain\Model\DeleteThing\DeleteThingRepository;
use App\Domain\Model\Order\Exceptions\OrderDosentExistsException;
use App\Domain\Model\Order\OrderClothe;
use App\Domain\Model\Order\OrderRepository;
use App\Domain\Model\User\User;
use App\Domain\Model\User\UserRepository;
use App\Domain\Services\Order\OrderClotheDeletorService;
use App\Domain\Services\OrderDetails\OrderDetailsDeletorService;
use PHPUnit\Framework\TestCase;

class OrderClotheDeleteTest extends TestCase
{
    private $stubRepository;

    /**
     * @var OrderClotheDelete
     */
    private $handle;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->stubRepository = $this->createMock(OrderRepository::class);

        $this->handle = new OrderClotheDelete(new OrderClotheDeletorService(    $this->stubRepository,
                                                                                $this->createMock(UserRepository::class),
                                                                                $this->createMock(DeleteThingRepository::class),
                                                                                $this->createMock(OrderDetailsDeletorService::class)));
    }

    /**
     * @test
     */
    public function dado_un_id_comprobar_que_no_exista()
    {
        $this->stubRepository->method('findById')
            ->willReturn(null);

        $this->expectException(OrderDosentExistsException::class);

        $this->handle->handle(new OrderClotheDeleteCommand('cc639e53-182b-465e-8e4f-8308c8be3b02'));
    }

    /**
     * @test
     */
    public function comprobar_que_hace_el_delete()
    {
        $this->stubRepository->method('findById')
            ->willReturn(new OrderClothe('cc639e53-182b-465e-8e4f-8308c8be3b02','cc639e53-182b-465e-8e4f-8308c8be3b02'));

        $this->handle->handle(new OrderClotheDeleteCommand('cc639e53-182b-465e-8e4f-8308c8be3b02'));

        $this->assertTrue(true);
    }
}
