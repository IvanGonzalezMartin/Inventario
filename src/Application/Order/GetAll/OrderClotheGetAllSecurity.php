<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:53
 */

namespace App\Application\Order\GetAll;


use App\Security\SecurityService;

class OrderClotheGetAllSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return $command;
    }
}