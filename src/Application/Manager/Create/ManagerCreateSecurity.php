<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:55
 */

namespace App\Application\Manager\Create;

use App\Security\SecurityService;

class ManagerCreateSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return ($command);
    }
}