<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:45
 */

namespace App\Application\ClotheCategory\Delete;

use App\Security\SecurityService;

class ClotheCategoryDeleteSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return ($command);
    }
}