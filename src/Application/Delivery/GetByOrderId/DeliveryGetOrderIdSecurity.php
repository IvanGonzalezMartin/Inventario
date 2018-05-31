<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 31/05/18
 * Time: 8:07
 */

namespace App\Application\Delivery\GetByOrderId;

use App\Security\SecurityService;

class DeliveryGetOrderIdSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return ($command);
    }

}