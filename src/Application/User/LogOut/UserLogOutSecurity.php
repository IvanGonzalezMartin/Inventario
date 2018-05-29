<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 9:35
 */

namespace App\Application\User\LogOut;

use App\Security\SecurityService;

class UserLogOutSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return $command;
    }
}