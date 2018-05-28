<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 11:38
 */

namespace App\Application\Order\GetByUserID;


use App\Domain\Services\Order\OrderClotheGetByUserIdService;

class OrderClotheGetByUserId
{
    private $orderClotheGetByUserIdService;
    private $dataTransform;

    public function __construct(OrderClotheGetByUserIdService $orderClotheGetByUserIdService, OrderClotheGetByUserIdDataTransform $dataTransform)
    {
        $this->orderClotheGetByUserIdService = $orderClotheGetByUserIdService;
        $this->dataTransform = $dataTransform;
    }

    /**
     * @return mixed
     */
    public function handle(OrderClotheGetByUserIdCommand $clotheGetByUserIdCommand)
    {
        return $this->dataTransform->transform($this->orderClotheGetByUserIdService->__invoke($clotheGetByUserIdCommand));
    }
}