<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:38
 */

namespace App\Application\User\LogIn;


use App\Security\SecurityService;

class UserLogInSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return $command;
    }
}