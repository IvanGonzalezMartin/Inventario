<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 11:42
 */

namespace App\Domain\Services\Order;


use App\Application\Order\GetByUserID\OrderClotheGetByUserIdCommand;
use App\Domain\Model\Order\OrderRepository;

class OrderClotheGetByUserIdService
{
    private $repository;


    public function __construct(OrderRepository $orderRepository)
    {
        $this->repository = $orderRepository;
    }

    /**
     * @return mixed
     */
    public function __invoke(OrderClotheGetByUserIdCommand $clotheGetByUserIdCommand)
    {
        return $this->repository->filterByUserId($clotheGetByUserIdCommand->id(), $clotheGetByUserIdCommand->oderPerPages(), $clotheGetByUserIdCommand->pages());
    }
}