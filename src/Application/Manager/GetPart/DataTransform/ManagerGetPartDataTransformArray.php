<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 23/05/18
 * Time: 13:35
 */

namespace App\Application\Manager\GetPart\DataTransform;


use App\Application\Manager\GetPart\ManagerGetPartDataTransform;

class ManagerGetPartDataTransformArray implements ManagerGetPartDataTransform
{
    public function transform($data)
    {
        $arrayManagers = [];
        foreach ($data as $manager){
            $arrayManagers[] = [
                "ID" => $manager->getId(),
                "NickName" => $manager->getNickName(),
                "Email" => $manager->getEmail(),
                "Name" => $manager->getName(),
                "Photo" => $manager->getPhoto()
            ];
        }
        return $arrayManagers;
    }
}