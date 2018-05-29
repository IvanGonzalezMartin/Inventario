<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:43
 */

namespace App\Application\User\Create;


use App\Security\SecurityService;

class UserCreateSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return $command;
    }
}