<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 31/05/18
 * Time: 8:06
 */

namespace App\Application\Delivery\GetByOrderId;


class DeliveryGetOrderIdCommand
{
    private $orderId;

    /**
     * DeliveryGetOrderIdCommand constructor.
     * @param $orderId
     */
    public function __construct($orderId)
    {
        $this->orderId = $orderId;
    }

    public function orderId()
    {
        return $this->orderId;
    }
}
