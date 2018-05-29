<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:54
 */

namespace App\Application\Gender\AllGenders;

use App\Security\SecurityService;

class GenderAllSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return ($command);
    }
}