<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 11:43
 */

namespace App\Application\Delivery\Create;

use App\Domain\Model\Delivery\Delivery;
use App\Domain\Services\Delivery\DeliveryCreateService;

class DeliveryCreate
{
    private $deliveryCreateService;

    public function __construct(DeliveryCreateService $deliveryCreateService)
    {
        $this->deliveryCreateService = $deliveryCreateService;
    }

    public function handle(DeliveryCreateCommand $deliveryCreateCommand)
    {
        $this->deliveryCreateService->__invoke($deliveryCreateCommand);
    }
}