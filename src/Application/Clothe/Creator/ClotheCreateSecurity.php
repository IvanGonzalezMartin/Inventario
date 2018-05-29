<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:41
 */

namespace App\Application\Clothe\Creator;


use App\Security\SecurityService;

class ClotheCreateSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return ($command);
    }
}