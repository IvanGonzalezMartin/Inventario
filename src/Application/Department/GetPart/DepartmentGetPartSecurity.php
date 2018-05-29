<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:52
 */

namespace App\Application\Department\GetPart;

use App\Security\SecurityService;

class DepartmentGetPartSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return ($command);
    }
}