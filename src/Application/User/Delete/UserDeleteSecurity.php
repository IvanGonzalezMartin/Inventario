<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:43
 */

namespace App\Application\User\Delete;


use App\Security\SecurityService;

class UserDeleteSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return $command;
    }
}