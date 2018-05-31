<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 16/05/18
 * Time: 10:15
 */

namespace App\Application\Manager\GetAll\DataTransforms;


use App\Application\Manager\GetAll\ManagerGetAllDataTransform;

class ManagerGetAllDataTransformArray implements ManagerGetAllDataTransform
{
    public function transform($managers)
    {
        $arrayManagers = [];
        foreach ($managers as $manager){
            $arrayManagers[] = [
                "id" => $manager->getId(),
                "nick_name" => $manager->getNickName(),
                "email" => $manager->getEmail(),
                "name" => $manager->getName(),
                "photo" => $manager->getPhoto(),
                "rol" => $manager->getRol()
            ];
        }
        return $arrayManagers;
    }
}
