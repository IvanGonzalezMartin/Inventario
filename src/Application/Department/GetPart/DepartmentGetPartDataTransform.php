<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 10:17
 */

namespace App\Application\Department\GetPart;


interface DepartmentGetPartDataTransform
{
    public function transform($departments);
}