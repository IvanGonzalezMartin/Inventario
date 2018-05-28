<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 26/04/2018
 * Time: 18:56
 */

namespace App\Domain\Model\OrderDetails;


interface OrderDetailsRepository
{
    public function update(): void;
    public function insert(OrderDetails $orderDetails);
    public function givMeAllOrderDetailsById($orderID);
}