<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 9:23
 */

namespace App\Domain\Services\OrderDetails;


use App\Application\Order\Delete\OrderClotheDeleteCommand;
use App\Domain\Model\OrderDetails\OrderDetails;
use App\Domain\Model\OrderDetails\OrderDetailsRepository;

class OrderDetailsDeletorService
{
    private $orderDetailsRepository;

    public function __construct(OrderDetailsRepository $orderDetailsRepository)
    {
        $this->orderDetailsRepository = $orderDetailsRepository;
    }

    public function execute(OrderClotheDeleteCommand $orderClotheDeleteCommand, $orderID)
    {
        $orderDetailsArray = $this->orderDetailsRepository->givMeAllOrderDetailsById($orderClotheDeleteCommand->id());

        foreach ($orderDetailsArray as $orderDetailsDelete){
            $orderDetailsDelete->setDeleteID($orderID);
        }

        $this->orderDetailsRepository->update();
    }
}