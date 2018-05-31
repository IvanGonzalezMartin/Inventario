<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 31/05/18
 * Time: 8:05
 */

namespace App\Application\Delivery\GetByOrderId;


use App\Domain\Services\Delivery\DeliveryGetByOrderIdService;

class DeliveryGetOrderId
{
    private $deliveryGetOrderIdService;

    public function __construct(DeliveryGetByOrderIdService $deliveryGetOrderIdService,
                                DeliveryGetOrderIdDataTransform $dataTransform)
    {
        $this->deliveryGetOrderIdService = $deliveryGetOrderIdService;
        $this->dataTransform = $dataTransform;
    }

    public function handle(DeliveryGetOrderIdCommand $deliveryGetOrderIdCommand)
    {
        return $this->dataTransform->transform($this->deliveryGetOrderIdService->__invoke($deliveryGetOrderIdCommand));
    }
}