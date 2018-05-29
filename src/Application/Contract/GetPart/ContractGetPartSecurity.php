<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:50
 */

namespace App\Application\Contract\GetPart;

use App\Security\SecurityService;

class ContractGetPartSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return ($command);
    }
}