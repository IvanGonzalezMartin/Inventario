<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:44
 */

namespace App\Application\SizeType\AllSizeType;


use App\Security\SecurityService;

class SizeTypeAllSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return $command;
    }
}