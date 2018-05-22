<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 10:18
 */

namespace App\Application\Department\GetPart\DataTransforms;


use App\Application\Department\GetPart\DepartmentGetPartDataTransform;

class DepartmentGetPartDataTransformArray implements DepartmentGetPartDataTransform
{

    public function transform($departments)
    {

        $arrayDepartment = [];

        foreach ($departments as $department){
            $arrayDepartment[] = [
                "Parent Department Id" => $department->getParentDepartmentID(),
                "Name" => $department->getName()
            ];
        }
        return $arrayDepartment;
    }
}