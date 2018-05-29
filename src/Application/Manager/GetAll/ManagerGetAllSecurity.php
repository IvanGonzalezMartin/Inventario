<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:57
 */

namespace App\Application\Manager\GetAll;


use App\Security\SecurityService;

class ManagerGetAllSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return ($command);
    }
}