<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 3/05/18
 * Time: 9:31
 */

namespace App\Application\Role\AllRoles\DataTransform;


use App\Application\Role\AllRoles\RoleAllDataTransform;

class RoleAllDataTransformArray implements RoleAllDataTransform
{

    public function transform($data)
    {
       return $data;
    }
}