<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:47
 */

namespace App\Application\ClotheCategory\GetAll;

use App\Security\SecurityService;

class ClotheCategoryGetAllSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return ($command);
    }
}