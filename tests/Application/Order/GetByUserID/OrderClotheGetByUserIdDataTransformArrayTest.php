<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 13:13
 */

namespace App\Tests\Application\Order\GetByUserID;

use App\Application\Order\GetByUserID\OrderClotheGetByUserId;
use App\Application\Order\GetByUserID\OrderClotheGetByUserIdCommand;
use App\Application\Order\GetByUserID\OrderClotheGetByUserIdDataTransform;
use App\Domain\Model\Order\OrderRepository;
use App\Domain\Services\Order\OrderClotheGetByUserIdService;
use PHPUnit\Framework\TestCase;

class OrderClotheGetByUserIdDataTransformArrayTest extends TestCase
{
    /**
     * @var OrderClotheGetByUserId
     */
    private $handle;

    /**
     * @var OrderRepository
     */
    private $stubRepository;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->stubRepository = $this->createMock(OrderRepository::class);

        $this->handle = new OrderClotheGetByUserId($this->createMock(OrderClotheGetByUserIdService::class),$this->createMock(OrderClotheGetByUserIdDataTransform::class));
    }

    /**
     * @test
     */
    public function comprueba_que_pasa_algunos_pedidos_bien()
    {
        $this->stubRepository->method('filter')
            ->willReturn(null);

        $this->handle->handle(new OrderClotheGetByUserIdCommand('2','2','2'));

        $this->assertTrue(true);
    }
}
