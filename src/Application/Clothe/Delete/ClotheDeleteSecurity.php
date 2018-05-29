<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:41
 */

namespace App\Application\Clothe\Delete;

use App\Security\SecurityService;

class ClotheDeleteSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return ($command);
    }
}