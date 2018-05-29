<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:10
 */

namespace App\Application\OrderDetails\GetByOrderID;

use App\Security\SecurityService;

class OrderDetailsSecurity implements SecurityService
{

    public function execute($request, $command)
    {
        return $command;
    }
}