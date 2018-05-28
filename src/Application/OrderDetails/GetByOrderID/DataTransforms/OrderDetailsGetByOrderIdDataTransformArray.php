<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 13:50
 */

namespace App\Application\OrderDetails\GetByOrderID\DataTransforms;

use App\Application\OrderDetails\GetByOrderID\OrderDetailsGetByOrderIdDataTransform;

class OrderDetailsGetByOrderIdDataTransformArray implements OrderDetailsGetByOrderIdDataTransform
{
    public function transform($data)
    {
        $arrayOrderDetails = [];
        foreach ($data as $orderDetails){
            $arrayOrderDetails[] = [
                "ID" => $orderDetails->getId(),
                "Clothe Size Stock ID" => $orderDetails->getClotheSizeStockID(),
                "Order ID" => $orderDetails->getOrderID()
            ];
        }
        return $arrayOrderDetails;
    }
}