<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:55
 */

namespace App\Application\Manager\CheckNickName;

use App\Security\SecurityService;

class ManagerCheckNickNameSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return ($command);
    }
}