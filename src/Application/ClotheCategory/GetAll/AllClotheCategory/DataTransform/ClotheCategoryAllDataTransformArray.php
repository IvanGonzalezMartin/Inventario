<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 8:18
 */

namespace App\Application\ClotheCategory\GetAll\AllClotheCategory\DataTransform;


use App\Application\ClotheCategory\GetAll\ClotheCategoryAllDataTransform;

class ClotheCategoryAllDataTransformArray implements ClotheCategoryAllDataTransform
{
    public function transform($data)
    {
        $clotheCategory = [];
            foreach ($data as $arrayClothes){
                $clotheCategory[]= [
                    "ID" => $arrayClothes->getId(),
                    "Name" => $arrayClothes->getName(),
                    "SizeType" => $arrayClothes->getSizeTypeName()
                ];
            }
        return $clotheCategory;
    }
}