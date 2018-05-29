<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:48
 */

namespace App\Application\Role\AllRoles;


use App\Security\SecurityService;

class RoleAllSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return $command;
    }
}