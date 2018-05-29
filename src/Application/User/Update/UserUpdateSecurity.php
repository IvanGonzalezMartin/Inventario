<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:42
 */

namespace App\Application\User\Update;


use App\Security\SecurityService;

class UserUpdateSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return $command;
    }
}