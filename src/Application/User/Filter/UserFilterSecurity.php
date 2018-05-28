<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 28/05/18
 * Time: 9:11
 */

namespace App\Application\User\Filter;


use App\Domain\Security\Services\AnyAuthenticatedUserOrManager;
use App\MiddelWare\Shared\FactoryOfServicesSecurity;
use App\Security\SecurityService;


class UserFilterSecurity implements SecurityService
{

    public function execute($request, $command)
    {
       FactoryOfServicesSecurity::getInstance()->getService(AnyAuthenticatedUserOrManager::class)('u');

        $n = new UserFilterCommand('','', '','',1, 6);

        return $n;
    }
}