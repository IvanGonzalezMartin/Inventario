<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:53
 */

namespace App\Application\Department\Update;

use App\Security\SecurityService;

class DepartmentUpdateSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return ($command);
    }
}