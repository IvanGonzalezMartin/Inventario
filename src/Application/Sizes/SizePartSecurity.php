<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:47
 */

namespace App\Application\Sizes;


use App\Security\SecurityService;

class SizePartSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return $command;
    }
}