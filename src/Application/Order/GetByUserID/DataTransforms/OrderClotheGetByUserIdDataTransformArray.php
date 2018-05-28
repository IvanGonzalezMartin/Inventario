<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 11:40
 */

namespace App\Application\Order\GetByUserID\DataTransforms;


use App\Application\Order\GetByUserID\OrderClotheGetByUserIdDataTransform;

class OrderClotheGetByUserIdDataTransformArray implements OrderClotheGetByUserIdDataTransform
{
    public function transform($data)
    {
        $arrayOrders = [];
        foreach ($data as $orders){
            $arrayOrders[] = [
                "ID" => $orders->getId(),
                "User ID" => $orders->getUserID(),
                "Date" => $orders->getDate(),
                "Description" => $orders->getDescription(),
                "Delivery ID" => $orders->getDeliveryId()
            ];
        }
        return $arrayOrders;
    }
}