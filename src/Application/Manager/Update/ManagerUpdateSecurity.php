<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:58
 */

namespace App\Application\Manager\Update;

use App\Security\SecurityService;

class ManagerUpdateSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return ($command);
    }
}