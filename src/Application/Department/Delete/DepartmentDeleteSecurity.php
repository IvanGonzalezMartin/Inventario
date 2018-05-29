<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:51
 */

namespace App\Application\Department\Delete;

use App\Security\SecurityService;

class DepartmentDeleteSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return ($command);
    }
}