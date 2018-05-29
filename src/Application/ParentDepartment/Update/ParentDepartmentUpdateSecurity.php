<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:50
 */

namespace App\Application\ParentDepartment\Update;


use App\Security\SecurityService;

class ParentDepartmentUpdateSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return $command;
    }
}