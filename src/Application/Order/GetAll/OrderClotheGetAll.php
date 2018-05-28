<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 9:52
 */

namespace App\Application\Order\GetAll;


use App\Domain\Services\Order\OrderClotheGetAllService;

class OrderClotheGetAll
{
    private $orderClotheGetAllService;
    private $dataTransform;

    public function __construct(OrderClotheGetAllService $orderClotheGetAllService, OrderClotheGetAllDataTransform $dataTransform)
    {
        $this->orderClotheGetAllService = $orderClotheGetAllService;
        $this->dataTransform = $dataTransform;
    }

    /**
     * @return mixed
     */
    public function handle(OrderClotheGetAllCommand $orderClotheGetAllCommand)
    {
        return $this->dataTransform->transform($this->orderClotheGetAllService->__invoke($orderClotheGetAllCommand));
    }
}