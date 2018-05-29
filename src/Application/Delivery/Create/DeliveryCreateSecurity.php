<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 12:24
 */

namespace App\Application\Delivery\Create;

use App\Security\SecurityService;

class DeliveryCreateSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return ($command);
    }
}