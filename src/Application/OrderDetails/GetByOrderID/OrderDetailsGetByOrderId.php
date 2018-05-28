<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 13:37
 */

namespace App\Application\OrderDetails\GetByOrderID;


use App\Domain\Services\OrderDetails\OrderDetailsGetByOrderIdService;

class OrderDetailsGetByOrderId
{
    private $orderDetailsGetByOrderIdService;
    private $dataTransform;

    public function __construct(OrderDetailsGetByOrderIdService $orderDetailsGetByOrderIdService, OrderDetailsGetByOrderIdDataTransform $dataTransform)
    {
        $this->orderDetailsGetByOrderIdService = $orderDetailsGetByOrderIdService;
        $this->dataTransform = $dataTransform;
    }

    /**
     * @return mixed
     */
    public function handle(OrderDetailsGetByOrderIdCommand $orderDetailsGetByOrderIdCommand)
    {
        return $this->dataTransform->transform($this->orderDetailsGetByOrderIdService->__invoke($orderDetailsGetByOrderIdCommand));
    }
}