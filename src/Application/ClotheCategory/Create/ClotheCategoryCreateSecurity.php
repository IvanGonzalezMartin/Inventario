<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 29/05/18
 * Time: 8:44
 */

namespace App\Application\ClotheCategory\Create;

use App\Security\SecurityService;

class ClotheCategoryCreateSecurity implements SecurityService
{
    public function execute($request, $command)
    {
        return ($command);
    }
}