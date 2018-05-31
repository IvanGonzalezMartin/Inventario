<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 31/05/18
 * Time: 8:21
 */

namespace App\Application\Delivery\GetByOrderId;


interface DeliveryGetOrderIdDataTransform
{
    public function transform($data);
}