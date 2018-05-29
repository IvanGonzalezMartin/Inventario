<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:49
 */

namespace App\Application\ClotheSizeStock\Update;

use App\Security\SecurityService;

class ClotheSizeStockUpdateSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return ($command);
    }
}