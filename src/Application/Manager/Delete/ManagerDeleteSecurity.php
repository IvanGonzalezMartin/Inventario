<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:56
 */

namespace App\Application\Manager\Delete;

use App\Security\SecurityService;

class ManagerDeleteSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return ($command);
    }
}