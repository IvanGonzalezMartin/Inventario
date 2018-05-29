<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:47
 */

namespace App\Application\ClotheCategory\Update;

use App\Security\SecurityService;

class ClotheCathegoryUpdateSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return ($command);
    }
}