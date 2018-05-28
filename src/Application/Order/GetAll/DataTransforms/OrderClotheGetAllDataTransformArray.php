<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 9:57
 */

namespace App\Application\Order\GetAll\DataTransforms;


use App\Application\Order\GetAll\OrderClotheGetAllDataTransform;

class OrderClotheGetAllDataTransformArray implements OrderClotheGetAllDataTransform
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