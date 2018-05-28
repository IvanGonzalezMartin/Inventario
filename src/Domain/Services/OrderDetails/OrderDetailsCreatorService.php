<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 8:18
 */

namespace App\Domain\Services\OrderDetails;


use App\Application\Order\Create\OrderCreateCommand;
use App\Domain\Model\OrderDetails\OrderDetails;
use App\Domain\Model\OrderDetails\OrderDetailsRepository;

class OrderDetailsCreatorService
{
    private $orderDetailsRepository;

    public function __construct(OrderDetailsRepository $orderDetailsRepository)
    {
       $this->orderDetailsRepository = $orderDetailsRepository;
    }

    public function execute($orderID, OrderCreateCommand $orderCreateCommand)
    {
        foreach ($orderCreateCommand->orders() as $clotheSizeStock){
            $orderDetail= new OrderDetails($clotheSizeStock, $orderID);
            $this->orderDetailsRepository->insert($orderDetail);
        }
        $this->orderDetailsRepository->update();
    }
}