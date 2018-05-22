<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 9:15
 */

namespace App\Application\ParentDepartment\GetAll\DataTransforms;


use App\Application\ParentDepartment\GetAll\ParentDepartmentGetAllDataTransform;
use App\Domain\Model\ParentDepartment\ParentDepartment;

class ParentDepartmentGetAllDataTransformArray implements ParentDepartmentGetAllDataTransform
{
    public function transform($parentDepartment)
    {
        $arrayParentDepartment = [];

        foreach ($parentDepartment as $parent){
            $arrayParentDepartment[] = [
                "ID" => $parent->getId(),
                "Name" => $parent->getName()
            ];
        }
        return $arrayParentDepartment;
    }
}