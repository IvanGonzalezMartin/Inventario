<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:54
 */

namespace App\Application\Manager\CheckEmail;

use App\Security\SecurityService;

class ManagerCheckEmailSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return ($command);
    }
}