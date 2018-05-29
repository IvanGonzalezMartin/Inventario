<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:50
 */

namespace App\Application\ParentDepartment\GetAll;


use App\Security\SecurityService;

class ParentDepartmentGetAllSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return $command;
    }
}