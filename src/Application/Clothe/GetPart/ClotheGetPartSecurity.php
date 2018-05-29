<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:42
 */

namespace App\Application\Clothe\GetPart;

use App\Security\SecurityService;

class ClotheGetPartSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return ($command);
    }
}