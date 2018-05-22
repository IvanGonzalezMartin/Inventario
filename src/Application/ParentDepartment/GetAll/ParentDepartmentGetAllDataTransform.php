<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 22/05/18
 * Time: 9:14
 */

namespace App\Application\ParentDepartment\GetAll;


use App\Domain\Model\ParentDepartment\ParentDepartment;

interface ParentDepartmentGetAllDataTransform
{
    public function transform($parentDepartment);
}