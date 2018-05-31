<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 13:35
 */

namespace App\Domain\Services\Delivery;


use App\Application\Delivery\GetByOrderId\DeliveryGetOrderIdCommand;
use App\Domain\Model\Delivery\DeliveryRepository;

class DeliveryGetByOrderIdService
{
    private $repository;

    public function __construct(DeliveryRepository $deliveryRepository)
    {
        $this->repository = $deliveryRepository;
    }

    /**
     * @return mixed
     */
    public function __invoke(DeliveryGetOrderIdCommand $deliveryGetOrderIdCommand)
    {
        return $this->repository->findByOrder($deliveryGetOrderIdCommand->orderId());
    }
}