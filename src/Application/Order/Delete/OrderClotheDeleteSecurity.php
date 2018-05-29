<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:54
 */

namespace App\Application\Order\Delete;


use App\Security\SecurityService;

class OrderClotheDeleteSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return $command;
    }
}