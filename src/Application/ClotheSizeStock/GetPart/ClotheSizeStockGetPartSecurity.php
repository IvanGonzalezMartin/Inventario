<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:48
 */

namespace App\Application\ClotheSizeStock\GetPart;

use App\Security\SecurityService;

class ClotheSizeStockGetPartSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return ($command);
    }
}