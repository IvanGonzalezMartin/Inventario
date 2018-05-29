<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:50
 */

namespace App\Application\Contract\Update;

use App\Security\SecurityService;

class ContractUpdateSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return ($command);
    }
}