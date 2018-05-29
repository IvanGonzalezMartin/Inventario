<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:52
 */

namespace App\Application\Order\GetByUserID;


use App\Security\SecurityService;

class OrderClotheGetByUserIdSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return $command;
    }
}