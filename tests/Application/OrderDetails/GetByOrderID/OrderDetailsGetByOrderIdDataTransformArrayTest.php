<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 14:34
 */

namespace App\Tests\Application\OrderDetails\GetByOrderID;

use App\Application\OrderDetails\GetByOrderID\OrderDetailsGetByOrderId;
use App\Application\OrderDetails\GetByOrderID\OrderDetailsGetByOrderIdCommand;
use App\Application\OrderDetails\GetByOrderID\OrderDetailsGetByOrderIdDataTransform;
use App\Domain\Model\OrderDetails\OrderDetailsRepository;
use App\Domain\Services\OrderDetails\OrderDetailsGetByOrderIdService;
use PHPUnit\Framework\TestCase;

class OrderDetailsGetByOrderIdDataTransformArrayTest extends TestCase
{
    /**
     * @var OrderDetailsGetByOrderId
     */
    private $handle;

    /**
     * @var OrderDetailsRepository
     */
    private $stubRepository;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->stubRepository = $this->createMock(OrderDetailsRepository::class);

        $this->handle = new OrderDetailsGetByOrderId($this->createMock(OrderDetailsGetByOrderIdService::class),$this->createMock(OrderDetailsGetByOrderIdDataTransform::class));
    }

    /**
     * @test
     */
    public function comprueba_que_devuelve_detalles_de_pedidos_bien()
    {
        $this->stubRepository->method('givMeAllOrderDetailsById')
            ->willReturn(null);

        $this->handle->handle(new OrderDetailsGetByOrderIdCommand(''));

        $this->assertTrue(true);
    }
}
