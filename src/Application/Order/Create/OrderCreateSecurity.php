<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:54
 */

namespace App\Application\Order\Create;


use App\Security\SecurityService;

class OrderCreateSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return $command;
    }
}