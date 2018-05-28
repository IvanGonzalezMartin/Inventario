<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 24/05/18
 * Time: 8:45
 */

namespace App\Application\ClotheSizeStock\GetPart\DataTransform;


use App\Application\ClotheSizeStock\GetPart\ClotheSizeStockGetPartDataTransform;

class ClotheSizeStockDataTransformArray implements ClotheSizeStockGetPartDataTransform
{

    public function transform($data)
    {
        $clotheSizeStock = [];
        foreach ($data as $clothe){
            $clotheSizeStock [] = [
                'ID' => $clothe->getId(),
                'Clothe ID' => $clothe->getClotheId(),
                'Stock' => $clothe->getStock()
                ];
        }
        return $clotheSizeStock;
    }
}