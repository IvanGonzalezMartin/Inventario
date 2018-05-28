<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 13:45
 */

namespace App\Domain\Services\OrderDetails;


use App\Application\OrderDetails\GetByOrderID\OrderDetailsGetByOrderIdCommand;
use App\Domain\Model\OrderDetails\OrderDetailsRepository;

class OrderDetailsGetByOrderIdService
{
    private $repository;

    public function __construct(OrderDetailsRepository $orderDetailsRepository)
    {
        $this->repository = $orderDetailsRepository;
    }

    /**
     * @return mixed
     */
    public function __invoke(OrderDetailsGetByOrderIdCommand $orderDetailsGetByOrderIdCommand)
    {
        return $this->repository->givMeAllOrderDetailsById($orderDetailsGetByOrderIdCommand->id());
    }
}