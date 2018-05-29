<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:58
 */

namespace App\Application\Manager\GetPart;

use App\Security\SecurityService;

class ManagerGetPartSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return ($command);
    }
}