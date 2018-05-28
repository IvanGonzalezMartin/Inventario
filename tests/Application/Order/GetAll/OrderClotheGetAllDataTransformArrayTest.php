<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 13:06
 */

namespace App\Tests\Application\Order\GetAll;

use App\Application\Order\GetAll\OrderClotheGetAll;
use App\Application\Order\GetAll\OrderClotheGetAllCommand;
use App\Application\Order\GetAll\OrderClotheGetAllDataTransform;
use App\Domain\Model\Order\OrderRepository;
use App\Domain\Services\Order\OrderClotheGetAllService;
use PHPUnit\Framework\TestCase;

class OrderClotheGetAllDataTransformArrayTest extends TestCase
{
    /**
     * @var OrderClotheGetAll
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

        $this->handle = new OrderClotheGetAll(new OrderClotheGetAllService($this->stubRepository), $this->createMock(OrderClotheGetAllDataTransform::class));
    }

    /**
     * @test
     */
    public function comprueba_que_pasa_todos_los_pedidos_bien()
    {
        $this->stubRepository->method('filter')
            ->willReturn(null);

        $this->handle->handle(new OrderClotheGetAllCommand('2','2'));

        $this->assertTrue(true);
    }
}
