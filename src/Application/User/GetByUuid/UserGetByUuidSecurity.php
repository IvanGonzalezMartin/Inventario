<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:41
 */

namespace App\Application\User\GetByUuid;


use App\Security\SecurityService;

class UserGetByUuidSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return $command;
    }
}