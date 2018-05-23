<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 10:33
 */

namespace App\Application\Clothe\GetPart\DataTransform;


use App\Application\Clothe\GetPart\ClotheGetPartDataTransform;

class ClotheGetPartDataTransformArray implements ClotheGetPartDataTransform
{

    public function transform($data)
    {
        $clothe = [];
        foreach ($data as $arrayClothes){
            $clothe[]= [
                "ID" => $arrayClothes->getId(),
                "ClotheCategoryID" => $arrayClothes->getClotheCategoryId(),
                "Name" => $arrayClothes->getName(),
                "Description" => $arrayClothes->getDescription(),
                "Photo" => $arrayClothes->getPhoto(),
                "Gender" => $arrayClothes->getGender()
            ];
        }
        return $clothe;
    }
}