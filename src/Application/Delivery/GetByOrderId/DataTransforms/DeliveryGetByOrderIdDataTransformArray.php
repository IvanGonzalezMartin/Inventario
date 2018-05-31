<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 31/05/18
 * Time: 8:20
 */

namespace App\Application\Delivery\GetByOrderId\DataTransforms;

use App\Application\Delivery\GetByOrderId\DeliveryGetOrderIdDataTransform;

class DeliveryGetByOrderIdDataTransformArray implements DeliveryGetOrderIdDataTransform
{

    public function transform($data)
    {
        $arrayDelivery = [];

        foreach ($data as $delivery){
            $arrayDelivery[] = [
                "id" => $delivery->getId(),
                "order_id" => $delivery->getOrderID(),
                "manager_id" => $delivery->getManagerID(),
                "date" => $delivery->getDate(),
                "sing" => $delivery->getSign(),
                "doc_sing" => $delivery->getDocSign()
            ];
        }
        return $arrayDelivery;
    }
}