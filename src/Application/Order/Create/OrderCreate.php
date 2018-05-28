<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 24/05/18
 * Time: 10:17
 */

namespace App\Application\Order\Create;


use App\Domain\Services\Order\OrderCreatorService;

class OrderCreate
{
    private $orderCreatorService;

    public function __construct(OrderCreatorService $orderCreatorService)
    {
        $this->orderCreatorService = $orderCreatorService;
    }

    public function handle(OrderCreateCommand $orderCreateCommand)
    {
        dump($this->orderCreatorService);
        $this->orderCreatorService->__invoke($orderCreateCommand);
    }
}