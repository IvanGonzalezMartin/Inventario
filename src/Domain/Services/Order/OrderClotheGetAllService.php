<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 9:54
 */

namespace App\Domain\Services\Order;


use App\Application\Order\GetAll\OrderClotheGetAllCommand;
use App\Domain\Model\Order\OrderRepository;

class OrderClotheGetAllService
{
    private $repository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->repository = $orderRepository;
    }

    public function __invoke(OrderClotheGetAllCommand $orderClotheGetAllCommand)
    {
        return $this->repository->filter($orderClotheGetAllCommand->pages(), $orderClotheGetAllCommand->oderPerPages());
    }
}