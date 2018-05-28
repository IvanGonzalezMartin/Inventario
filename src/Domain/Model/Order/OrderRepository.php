<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 26/04/2018
 * Time: 18:55
 */

namespace App\Domain\Model\Order;


interface OrderRepository
{
    public function findById($id);
    public function insert(OrderClothe $orderClothe);
    public function update();
    public function findAllById($id);
}