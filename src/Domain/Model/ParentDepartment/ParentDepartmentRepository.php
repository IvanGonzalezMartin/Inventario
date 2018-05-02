<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 26/04/2018
 * Time: 18:57
 */

namespace App\Domain\Model\ParentDepartment;


interface ParentDepartmentRepository
{
    public function insert(ParentDepartment $parentDepartment): void;
}